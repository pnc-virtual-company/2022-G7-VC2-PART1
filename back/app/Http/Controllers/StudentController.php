<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    //========================= show all students ========================
    public function index()
    {
        return Student::with(['class','batch','admin'])->get();
    }

    //========================== add new student ========================
    public function store(Request $request)
    {
        $students = new Student();
        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->gender = $request->gender;
        $students->email = $request->email;
        $students->password = bcrypt($request->password);
        $students->phone_number = $request->phone_number;
        $students->role = $request->role;
        $students->profile = $request->profile;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;
        // $path = public_path('images/Student');
        // if ( ! file_exists($path) ) {
        //     mkdir($path, 0777, true);
        // }
        // $file = $request->file('profile');
        // $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        // $students->Profile = $fileName;
        // $students->save();
        // $file->move($path, $fileName);

        $students->save();
    }

    //========================== show one student ========================
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    //========================== update student ========================
    public function update(Request $request, $id)
    {
        $students = Student::findOrFail($id);
        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->gender = $request->gender;
        $students->email = $request->email;
        $students->role = $request->role;
        $students->password = bcrypt($request->password);
        $students->phone_number = $request->phone_number;
        $students ->profile = $request->profile;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;
        // $path = public_path('images/Student');
        // if ( ! file_exists($path) ) {
        //     mkdir($path, 0777, true);
        // }
        // $file = $request->file('profile');
        // $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        // $students->Profile = $fileName;
        // $students->save();
        // $file->move($path, $fileName);
        $students->save();
        
        return response()->Json(['messsage'=>'Scuccfully for Update Student']);

    }

   //========================== delete student ==================
    public function destroy($id)
    {
        return Student::destroy($id);
    }
    
    //========================= Reset password ===================
    public function StudentResetPassword(Request $request, $studentId){
        $student = Student::find($studentId);
        if(Hash::check($request->oldpassword,$student->password)){
            $student->password = bcrypt($request->newPassword);
        }
        $student->save();
        return Response()->json($student);
    }
}
