<?php

namespace Portfolio\Model\Entity;

/**
 * Sécurise les entités
 */
class SecureData
{
    public function clean_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}