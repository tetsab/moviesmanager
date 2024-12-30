<?php

class Validation {
    public $validations = [];

    public static function validate($rules, $data) 
    {
        $validation = new self();
        
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                $fieldValue = isset($data[$field]) ? $data[$field] : '';
                
                if ($rule == 'confirmed' && !empty($field)) {   
                    if (!isset($data['email_confirmation'])) {
                        $data['email_confirmation'] = '';
                    }                 
                    $validation->$rule($field, $fieldValue, $data["{$field}_confirmation"]);
                } elseif (str_contains($rule, ":")) {
                    $temp = explode(':', $rule);
                    $rule = $temp[0];
                    $ruleArg = $temp[1];
                    
                    $validation->$rule($ruleArg, $field, $fieldValue);
                } else {
                    $validation->$rule($field, $fieldValue);
                }
            }
        }
        
        return $validation;
    }

    private function unique($table, $field, $value)
    {
        if (strlen($value) == 0) {
            return;
        }

        $db = new Database(config('database'));

        $result = $db->query(
            query: "select * from $table where $field = :value",
            params: [
                'value' => $value
            ]
        )->fetch();

        if ($result) {
            $this->validations[] = "The $field is already in use.";
        }
    }

    private function required($field, $value) {
        if (strlen($value) == 0) {
            $this->validations[] = "The $field is obligatory.";
        }
    }

    private function email($field, $value) {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validations[] = "The $field is invalid.";
        }
    }

    private function confirmed($field, $value, $confirmationValue) {
        if ($value != $confirmationValue) {
            $this->validations[] = "The $field is different.";
        }
    }

    private function min($min, $field, $value) {
        if(strlen($value) <= $min) {
            $this->validations[] = "The $field must have at least $min characters.";
        }
    }

    private function max($max, $field, $value) {
        if(strlen($value) >= $max) {
            $this->validations[] = "The $field must have at max $max characters.";
        }
    }

    private function strong($field, $value) {
        if (!preg_match('/[^a-zA-Z0-9\s]/', $value)) {
            $this->validations[] = "The $field must have at least one special character.";
        }
    }

    public function notApproved(?string $customName = null): bool 
    {
        $key = 'validations';
        if ($customName) {
            $key .= '_'.$customName;
        }
        flash()->push($key, $this->validations);
        return sizeof($this->validations ?? []) > 0;
    }
}
