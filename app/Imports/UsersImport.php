<?

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
     /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'name'     => $row[1],
           'l_name'     => $row[2],
           'email'    => $row[5], 
           'phone_number'    => $row[9],
           'dashboard_style'    => $row[14],
           'password' => Hash::make($row[15]),
           'status' =>$row[46]
        ]);
    }
}
