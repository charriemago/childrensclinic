<?php
include 'parent_model.php';

class Patient_model extends Model
{   
    protected $table = 'tbl_patient';

	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');   
    }

    public function all() {
        $data = DB::selectByColumn(DATABASE_NAME, $this->table, array('active' => 'yes'));
        return $data;
    }

    public function info($id) {
        $data = DB::load(DATABASE_NAME, $this->table, $id);
        $data['parent'] = $this->parent($id);
        $data['birthHistory'] = $this->birthHistory($id);
        return $data;
    }
    
    public function checkName($patient_name) {
        $where = compact('patient_name');
        return Db::selectByColumn(DATABASE_NAME, $this->table, $where);
    }

    public function parent($patient_id) {
        return Parent_model::findByPatientId($patient_id);
    }

    public function birthHistory($patient_id) {
        $data = Db::selectByColumn(DATABASE_NAME, 'tbl_birth_history', array('patient_id' => $patient_id));
        return !empty($data) ? $data[0] : [];
    }
    public function delete(){
        $data['active'] = 'no';
        $data['modified_by'] = 1;
        $data['date_modified'] = date('Y-m-d H:i:s');
        Db::update(DATABASE_NAME, 'tbl_patient', $data, array('id' => $_POST['id']));
    }
    public function insert() {
        $check =  $this->checkName($_POST['patient_name']);
        
        if(!empty($check)) {
            echo json_encode(['msg' => 'Patient has already saved on our records.']);
            http_response_code(400);
            exit;
        }

        $data = [
            'patient_name' => $_POST['patient_name'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'guardian_name' => $_POST['guardian_name'],
            'contact_no' => $_POST['contact_no'],
            'birthday' => $_POST['birthday'],
            'created_by' => 1
        ];
        $patient_id = Db::insert(DATABASE_NAME, $this->table, $data);
        if($patient_id > 0) {
            $parent_id = $this->insertParent($patient_id);
            if($parent_id > 0) {
                $birth_history_id = $this->insertBirthHistory($patient_id);
                if($birth_history_id > 0) {
                    $this->insertImmunizationRecord($patient_id);
                    echo json_encode([
                        'msg' => 'Record successfully saved'
                    ]);
                }
            }
        }
    }

    public function insertParent($patientId) {
        $data = array(
            'patient_id' => $patientId,
            'father_name' => $_POST['father_name'],
            'father_occupation' => $_POST['father_occupation'],
            'father_telephone' => $_POST['father_telephone'],
            'mother_name' => $_POST['mother_name'],
            'mother_occupation' => $_POST['mother_occupation'],
            'mother_telephone' => $_POST['mother_telephone'],
            'created_by' => 1
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_parent', $data);
        return $id;
    }

    public function insertBirthHistory($patientId) {
        $data = array(
            'patient_id' => $patientId,
            'term' => $_POST['term'],
            'no_of_mos' => $_POST['no_of_mos'],
            'weeks' => $_POST['weeks'],
            'days' => $_POST['days'],
            'type_of_delivery' => $_POST['type_of_delivery'],
            'birth_weight' => $_POST['birth_weight'],
            'birth_length' => $_POST['birth_length'],
            'blood_type' => $_POST['blood_type'],
            'head_circumference' => $_POST['head_circumference'],
            'chest_circumference' => $_POST['chest_circumference'],
            'abdominal_circumference' => $_POST['abdominal_circumference'],
            'created_by' => 1
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_birth_history', $data);
        return $id;
    }

    public function insertImmunizationRecord($patientId) {
        $vaccines = Vaccine_model::all();
        foreach($vaccines as $vaccine) {
            $data = array(
                'patient_id' => $patientId,
                'vaccine_id' => $vaccine['id'],
                '1st' => isset($_POST['1st'][$vaccine['id']]) ? 1 : 0,
                '2nd' => isset($_POST['2nd'][$vaccine['id']]) ? 1 : 0,
                '3rd' => isset($_POST['3rd'][$vaccine['id']]) ? 1 : 0,
                'Booster_1' => isset($_POST['Booster_1'][$vaccine['id']]) ? 1 : 0,
                'Booster_2' => isset($_POST['Booster_2'][$vaccine['id']]) ? 1 : 0,
                'Booster_3' => isset($_POST['Booster_3'][$vaccine['id']]) ? 1 : 0,
                'reaction' => $_POST['reaction'][$vaccine['id']],
                'created_by' => 1
            );
            $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record', $data);
        }
    }

    public function update() {
        $check =  $this->checkName($_POST['patient_name']);
        
        if(!empty($check)) {
            if($check[0]['id'] != $_POST['patient_id']) {
                echo json_encode(['msg' => 'Patient has already saved on our records.']);
                http_response_code(400);
                exit;
            }
        }

        $patient = $this->info($_POST['patient_id']);
        
        if(!empty($patient)) {
            $where = [
                'id' => $patient['id']
            ];

            $parent = $patient['parent'];
            unset($patient['parent']);
            
            $birthHistory = $patient['birthHistory'];
            unset($patient['birthHistory']);
            
            $data = $patient;
            unset($data['id']);
        
            $data['patient_name'] = $_POST['patient_name'];
            $data['address'] = $_POST['address'];
            $data['gender'] = $_POST['gender'];
            $data['guardian_name'] = $_POST['guardian_name'];
            $data['contact_no'] = $_POST['contact_no'];
            $data['birthday'] = $_POST['birthday'];
            $data['modified_by'] = 1;
            Db::update(DATABASE_NAME, $this->table, $data, $where);
            
            $this->updateParent($parent);
            $this->updateBirthHistory($birthHistory);
            $this->updateImmunizationRecord($patient['id']); 
                
            echo json_encode([
                'msg' => 'Record successfully saved'
            ]);
        }
    }

    public function updateParent($data = []) {
        $where = [
            'id' => $data['id']
        ];
        unset($data['id']);

        $data['father_name'] = $_POST['father_name'];
        $data['father_occupation'] = $_POST['father_occupation'];
        $data['father_telephone'] = $_POST['father_telephone'];
        $data['mother_name'] = $_POST['mother_name'];
        $data['mother_occupation'] = $_POST['mother_occupation'];
        $data['mother_telephone'] = $_POST['mother_telephone'];
        Db::update(DATABASE_NAME, 'tbl_parent', $data, $where);
    }

    public function updateBirthHistory($data = []) {
        $where = [
            'id' => $data['id']
        ];
        unset($data['id']);

        $data['term'] = $_POST['term'];
        $data['no_of_mos'] = $_POST['no_of_mos'];
        $data['weeks'] = $_POST['weeks'];
        $data['days'] = $_POST['days'];
        $data['type_of_delivery'] = $_POST['type_of_delivery'];
        $data['birth_weight'] = $_POST['birth_weight'];
        $data['birth_length'] = $_POST['birth_length'];
        $data['blood_type'] = $_POST['blood_type'];
        $data['head_circumference'] = $_POST['head_circumference'];
        $data['chest_circumference'] = $_POST['chest_circumference'];
        $data['abdominal_circumference'] = $_POST['abdominal_circumference'];
        $data['modified_by'] = 1;
        $data['date_modified'] = date('Y-m-d H:i:s');

        Db::update(DATABASE_NAME, 'tbl_birth_history', $data, $where);
    }

    public function updateImmunizationRecord($patientId) {
        $vaccines = Vaccine_model::all();
        foreach($vaccines as $vaccine) {
            $where1 = [
                'patient_id' => $patientId,
                'vaccine_id' => $vaccine['id'],
            ];
            
            $record = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', $where1);
            if(!empty($record)) {
                $data = $record[0];
                $where2 = [
                    'id' => $data['id']
                ];
                unset($data['id']);

                $data['1st'] = isset($_POST['1st'][$vaccine['id']]) ? 1 : 0;
                $data['2nd'] = isset($_POST['2nd'][$vaccine['id']]) ? 1 : 0;
                $data['3rd'] = isset($_POST['3rd'][$vaccine['id']]) ? 1 : 0;
                $data['Booster_1'] = isset($_POST['Booster_1'][$vaccine['id']]) ? 1 : 0;
                $data['Booster_2'] = isset($_POST['Booster_2'][$vaccine['id']]) ? 1 : 0;
                $data['Booster_3'] = isset($_POST['Booster_3'][$vaccine['id']]) ? 1 : 0;
                $data['reaction'] = $_POST['reaction'][$vaccine['id']];
                $data['modified_by'] = 1;
                $data['date_modified'] = date('Y-m-d H:i:s');
                Db::update(DATABASE_NAME, 'tbl_immunization_record', $data, $where2);
            } else {
                $data = array(
                    'patient_id' => $patientId,
                    'vaccine_id' => $vaccine['id'],
                    '1st' => isset($_POST['1st'][$vaccine['id']]) ? 1 : 0,
                    '2nd' => isset($_POST['2nd'][$vaccine['id']]) ? 1 : 0,
                    '3rd' => isset($_POST['3rd'][$vaccine['id']]) ? 1 : 0,
                    'Booster_1' => isset($_POST['Booster_1'][$vaccine['id']]) ? 1 : 0,
                    'Booster_2' => isset($_POST['Booster_2'][$vaccine['id']]) ? 1 : 0,
                    'Booster_3' => isset($_POST['Booster_3'][$vaccine['id']]) ? 1 : 0,
                    'reaction' => $_POST['reaction'][$vaccine['id']],
                    'created_by' => 1
                );
                $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record', $data);
            }
        }
    }
}