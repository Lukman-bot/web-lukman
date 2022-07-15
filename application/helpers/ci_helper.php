<?php

function slugify($text)
{
   // replace non letter or digits by -
   $text = preg_replace('~[^\pL\d]+~u', '-', $text);

   // transliterate
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

   // remove unwanted characters
   $text = preg_replace('~[^-\w]+~', '', $text);

   // trim
   $text = trim($text, '-');

   // remove duplicate -
   $text = preg_replace('~-+~', '-', $text);

   // lowercase
   $text = strtolower($text);

   if (empty($text)) {
      return 'n-a';
   }

   return $text;  
}

function getDropdownList($table, $columns)
{
    $CI =& get_instance();  // Memanggil core system dari CI, agar kita dapat memanggil class2 dari CI
    $query = $CI->db->select($columns)->from($table)->get();

    if ($query->num_rows() >= 1) {
        // '' sebagai value dari option select & select akan muncul di browser
        $option1 = ['' => '- Select -'];
        $option2 = array_column($query->result_array(), $columns[1], $columns[0]);   // Param 2 & 3 adalah key
        $options = $option1 + $option2;

        return $options;
    }

    return $options = ['' => '- Select -'];
}

/**
 * Mengenkripsi input
 */
function hashEncrypt($input)
{
    $hash = password_hash($input, PASSWORD_DEFAULT);
    return $hash;
}

/**
 * Mendecrypt hash password dari table user
 * Mengembalikan true jika plain-text sama
 */
function hashEncryptVerify($input, $hash)
{
    if (password_verify($input, $hash)) {
        return true;
    } else {
        return false;
    }
}
