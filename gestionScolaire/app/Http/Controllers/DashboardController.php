<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Enseignant;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $studentsTotal = Student::count();
    $totalTeachers = Enseignant::count();
    $totalModules = Module::count();
    $totalAffectations = Affectation::count();
    return view('admin.dashboard', ['studentsTotal' => $studentsTotal, 'totalTeachers' => $totalTeachers,'totalModule'=> $totalModules, 'totalAffectations' => $totalAffectations]);
  }

  public function fetchStudents()
  {
    $students = Student::all();
    return view('admin.allStudents', ['students' => $students]);
  }


  public function fetchTeachers()
  {
    $teachers = Enseignant::all();
    return view('admin.allTeachers', ['teachers' => $teachers]);
  }

  public function fetchModules()
  {
    $modules = Module::all();
    return view('admin.allModules', ['modules' => $modules]);
  }

  /**
   * Show the form for creating a new resource.
   */

  public function createModule()
  {
    return view('admin.crudModules.AddModule');
  }
  public function createStudent()
  {
    return view('admin.crudStudents.AddStudent');
  }

  public function createTeacher()
  {
    return view('admin.crudTeachers.addTeacher');
  }

  /**
   * Store a newly created resource in storage.
   */

  public function storeModule(Request $request)
  {
    $libelle = $request->libelle;
    $masse_horaire = $request->masse_horaire;
    $capacite = $request->capacite;

    Module::create([
      'libelle' => $libelle,
      'masse_horaire' => $masse_horaire,
      'capacite' => $capacite
    ]);

    return redirect()->route('modules-list')->with('success', 'Module has been created');
  }

  public function storeStudent(Request $request)
  {
    $nom = $request->nom;
    $prenom = $request->prenom;
    $email = $request->email;
    $age = $request->age;
    $phone = $request->phone;

    Student::create([
      'nom' => $nom,
      'prenom' => $prenom,
      'age' => $age,
      'email' => $email,
      'phone' => $phone
    ]);

    return redirect()->route('students-list')->with('success', 'Student has been created');
  }


  public function storeTeacher(Request $request)
  {
    $nom = $request->nom;
    $prenom = $request->prenom;
    $email = $request->email;
    $phone = $request->phone;

    Enseignant::create([
      'nom' => $nom,
      'prenom' => $prenom,
      'email' => $email,
      'phone' => $phone
    ]);

    return redirect()->route('teachers-list')->with('success', 'Teacher has been created');
  }

  /**
   * Display the specified resource.
   */
  
   public function showModule(string $id)
   {
     $module = Module::find($id);
     return view('admin.crudModules.ModuleDetails', ['module' => $module]);
   }

   public function showStudent(string $id)
  {
    $student = Student::find($id);
    return view('admin.crudStudents.studentDetails', ['student' => $student]);
  }

  public function showTeacher(string $id)
  {
    $teacher = Enseignant::find($id);
    return view('admin.crudTeachers.teacherDetails', ['teacher' => $teacher]);
  }

  /**
   * Show the form for editing the specified resource.
   */

  public function editModule(string $id)
  {
    $module = Module::find($id);
    return view('admin.crudModules.EditModule', ['module' => $module]);
  }

  public function editStudent(string $id)
  {
    $student = Student::find($id);
    return view('admin.crudStudents.EditStudent', ['student' => $student]);
  }

  public function editTeacher(string $id)
  {
    $teacher = Enseignant::find($id);
    return view('admin.crudTeachers.editTeacher', ['teacher' => $teacher]);
  }


  /**
   * Update the specified resource in storage.
   */

  public function updateModule(Request $request, string $id)
  {
    $module = Module::find($id);
    $libelle = $request->libelle;
    $masse_horaire = $request->masse_horaire;
    $capacite = $request->capacite;

    $module->libelle = $libelle;
    $module->masse_horaire = $masse_horaire;
    $module->capacite = $capacite;

    $module->save();
    return redirect()->route('modules-list')->with('success', 'Module has been updated successfully');
  }
  public function updateStudent(Request $request, string $id)
  {
    $student = Student::find($id);
    $nom = $request->nom;
    $prenom = $request->prenom;
    $email = $request->email;
    $age = $request->age;
    $phone = $request->phone;

    $student->nom = $nom;
    $student->prenom = $prenom;
    $student->email = $email;
    $student->age = $age;
    $student->phone = $phone;

    $student->save();

    return redirect()->route('students-list')->with('success', 'Student has been updated successfully');
  }

  public function updateTeacher(Request $request, string $id)
  {
    $teacher = Enseignant::find($id);
    $nom = $request->nom;
    $prenom = $request->prenom;
    $email = $request->email;
    $phone = $request->phone;

    $teacher->nom = $nom;
    $teacher->prenom = $prenom;
    $teacher->email = $email;
    $teacher->phone = $phone;

    $teacher->save();

    return redirect()->route('teachers-list')->with('success', 'Teacher has been updated successfully');
  }

  public function affectations()
  {
    $teachers = Enseignant::all();
    $modules = Module::all();
    return view('admin.affectations', ['teachers' => $teachers, 'modules' => $modules]);
  }

  public function assignTeacher(Request $request)
  {
    $teacher_id = $request->teacher;
    $module_id = $request->module;
    $date_affec = $request->date_affec;

    Affectation::create([
      'id_enseignant' => $teacher_id,
      'id_Module' => $module_id,
      'date_affectation' => $date_affec
    ]);

    return redirect()->route('teachers-list')->with('success', 'Teacher has been assigned to the module successfully');
  }

  /**
   * Remove the specified resource from storage.
   */

   public function destroyModule(string $id)
  {
    $module = Module::find($id);
    $module->delete();
    return redirect()->route("modules-list")->with('error', 'Module has been deleted successfully');
  }
  public function destroyStudent(string $id)
  {
    $student = Student::find($id);
    $student->delete();
    return redirect()->route("students-list")->with('error', 'Student has been deleted successfully');
  }

  public function destroyTeacher(string $id)
  {
    $teacher = Enseignant::find($id);
    $teacher->delete();
    return redirect()->route("teachers-list")->with('error', 'Teacher has been deleted successfully');
  }
}
