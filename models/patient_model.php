<?php
include 'parent_model.php';

class Patient_model extends Model
{   
    protected $table = 'tbl_patient';

	function __construct()
	{
		parent::__construct();
    }

    public function all() {
        $data = DB::loadAll(DATABASE_NAME, $this->table);
        return $data;
    }

    public function info($id) {
        $data = DB::load(DATABASE_NAME, $this->table, $id);
        $data['parent'] = $this->parent($id);
        return $data;
    }

    public function parent($patient_id) {
        return Parent_model::findByPatientId($patient_id);
    }

    public function insert() {
        // print_r($_POST);
        // exit;
        // $this->insertImmunizationRecord(); exit;
        $data = [
            'patient_name' => $_POST['patient_name'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'birthday' => $_POST['birthday'],
            'created_by' => 1,
            'modified_by' => 1
        ];
        $patient_id = Db::insert(DATABASE_NAME, $this->table, $data);
        if($patient_id > 0) {
            $parent_id = $this->insertParent($patient_id);
            if($parent_id > 0) {
                echo $parent_id;
                $birth_history_id = $this->insertBirthHistory($patient_id);
                echo $birth_history_id;
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
            'created_by' => 1,
            'modified_by' => 1,
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
            'created_by' => 1,
            'modified_by' => 1,
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
                'created_by' => 1,
                'modified_by' => 1,
            );
            $id = Db::insert(DATABASE_NAME, 'tbl_immunization_record', $data);
        }
    }

    public function update() {
        // Db::update(DATABASE_NAME, $this->table, $data, array('user_id' => 1, 'name' ));
    }

}