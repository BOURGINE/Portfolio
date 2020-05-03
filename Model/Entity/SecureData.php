<?php

namespace Portfolio\Model\Entity;

class SecureData
{
    /**
     * @return data
     */
    public function clean_data($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}