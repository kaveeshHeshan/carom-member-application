<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'address',
        'contact_number',
        'gender',
        'dob',
        'membership_type',
    ];

    protected $appends = [
        'name_with_initials',
        'reversed_address',
        'age',
        'contact_number_type',
    ];

    public function getNameWithInitialsAttribute()
    {
        // Get the current full name attibute value
        $fullName = $this->attributes['full_name'];
        $name = trim($fullName);

        // Convert name into array
        $split_name = explode(' ',$name);

        // Get the last value as last name
        $last_name = end($split_name);

        // Remove Last name from array
        array_pop($split_name);

        // Get initials
        $initialsArr = [];
        foreach ($split_name as $name_part) {
            array_push($initialsArr, $name_part[0]);
        }
        $initials = implode('.', $initialsArr);
        
        // Concatenation and Return value 
        return $initials.' '.$last_name;
    }

    public function getReversedAddressAttribute(){
        
        // Get the current address attibute value
        $address = $this->attributes['address'];

        // Convert address to array
        $split_address = explode(',',$address);

        foreach ($split_address as $addressPart) {
            $stringAddress [] = strlen($addressPart);
        }

        // Remove last '.' character if available.
        $split_address[count($stringAddress)-1] = str_replace('.', '', $split_address[count($stringAddress)-1]);

        // Make array in Reverse order
        $rearrangedAddressArr = array_reverse($split_address);

        // Make a comma seperated string.
        $rearrangedAddress = implode(', ', $rearrangedAddressArr);

        // Return value
        return $rearrangedAddress;

    }

    public function getAgeAttribute(){
    
        // Get the current dob (Date of Birth) attibute value
        $dob = $this->attributes['dob'];

        // Calculate age difference
        $ageDifference = Carbon::parse($dob)->age;

        // Return value
        return $ageDifference;

    }

    public function getContactNumberTypeAttribute(){
    
        // Phone Codes
        $mobileNumberCodesArr = ['70', '71', '72', '74', '75', '76', '77', '78'];
        $landLineNumberCodesArr = ['11', '36', '31', '33', '38', '34', '81', '54', '51', '52', '66', '91', '41', '47', '21', '23', '24', '63', '65', '67', '26', '25', '27', '32', '37', '55', '57', '45', '35'];

        // Get the current Contact Number attibute value
        $contactNumber = $this->attributes['contact_number'];

        // Remove leading 0s
        $contactNumber = ltrim($contactNumber, '0');
        
        // Get contact number type
        if (in_array(substr($contactNumber, 0, 2), $mobileNumberCodesArr)) {
            
            $contactNumberType = 'Mobile';

        } else if(in_array(substr($contactNumber, 0, 2), $landLineNumberCodesArr)) {
            
            $contactNumberType = 'Land Line';

        } else {

            $contactNumberType = 'Unknown';

        }
        

        // Return value
        return $contactNumberType;

    }
}
