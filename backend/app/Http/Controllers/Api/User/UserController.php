<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use App\Models\{Patient};
use App\Models\{Professional};

class UserController extends Controller
{
    public function index(Request $request)
    {
        $professionalList = User::with(['Professional'])
            ->whereHas("Professional");

        if ($request->has('search')) {
            if ($request->get('search') && (mb_strtolower($request->get('search')) != 'null')) {
                $_search = str_replace(['"', "'", '%', '\\'], '_', mb_strtolower(trim($request->get('search'))));
    
                $professionalList->whereRaw("LOWER(name) LIKE '%{$_search}%'");
            }
        }

        $professionalList = $professionalList->paginate($request->has('per-page') ? $request->get('per-page') : 10);

       

        return response()->json($professionalList, 200);
    }

    public function getSelf(Request $request)
    {
        return response()->json($request->user()->load(['Patient', 'Professional']), 200);
    }

    public function get(Request $request, User $user)
    {
        return response()->json($user->load(['Patient', 'Professional']));
    }

    public function create(Request $request)
    {
        // dd('debug', $request->all());
        
        $request->validate([
            'email'=>['required', 'email', 'unique:users,email'],
            'name'=>['required'],
            'password'=>['required', 'min:6'],
            'user_type'=>['required'],
            'document'=>['required'],
            'phone'=>['nullable'],
            'whatsapp'=>['nullable'],
            'address'=>['nullable'],
            'postal_code'=>['nullable'],
            'appointment_value'=>['nullable'],
            'opening_hours'=>['nullable'],
            'days_open'=>['nullable'],
            'appointment_duration'=>['nullable'],
        ]);

        try {
            \DB::beginTransaction();

            $User = new User;
    
            $User->email = $request->get('email');
            $User->name = $request->get('name');
            $User->password = \Hash::make(trim($request->get('password')));
            $User->phone = $request->get('phone');
            $User->whatsapp = $request->get('whatsapp');
            $User->address = $request->get('address');
            $User->postal_code = $request->get('postal_code');
            $User->created_at = date('Y-m-d H:i:s');
            $User->updated_at = date('Y-m-d H:i:s');
            
            if($request->get('user_type') == 'patient') {
                $Patient = new Patient;

                $Patient->document = $request->get('document');
                $Patient->save();
                $User->patient_id = $Patient->id;
            } else {
                $Professional = new Professional;

                $Professional->document = $request->get('document');
                $Professional->appointment_value = $request->get('appointment_value');
                $Professional->opening_hours = json_encode($request->get('opening_hours'));
                $Professional->days_open = json_encode($request->get('days_open'));
                $Professional->appointment_duration = json_encode($request->get('appointment_duration'));

                $Professional->save();

                $User->professional_id = $Professional->id;
            }

            $User->save();
    
            \DB::commit();

            return response()->json($User, 200);
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e->getMessage());
        }
    }

    public function update(Request $request, User $user)
    {   
        try {
            if($user->Professional) {
                
                $user->name = $request->get('name');
                $user->password = \Hash::make(trim($request->get('password')));
                $user->phone = $request->get('phone');
                $user->whatsapp = $request->get('whatsapp');
                $user->address = $request->get('address');
                $user->postal_code = $request->get('postal_code');
    
                if($user->Professional) {
                    $Professional = $user->Professional;
                } else {
                    $Professional = new Professional;
                }
    
                $Professional->document = $request->get('document');
                $Professional->appointment_value = $request->get('appointment_value');
                $Professional->opening_hours = json_encode($request->get('opening_hours'));
                $Professional->days_open = json_encode($request->get('days_open'));
                $Professional->appointment_duration = json_encode($request->get('appointment_duration'));
                
                // dd('is a professional', $Professional);
                $Professional->save();
                $user->professional_id = $Professional->id;
                $user->save();
            } else {
                // dd('is a patient');
                $user->name = $request->get('name');
                $user->password = \Hash::make(trim($request->get('password')));
                $user->phone = $request->get('phone');
                $user->whatsapp = $request->get('whatsapp');
                $user->address = $request->get('address');
                $user->postal_code = $request->get('postal_code');
                
                if($user->Patient) {
                    $Patient = $user->Patient;
                } else {
                    $Patient = new Patient;
                }

                $Patient->document = $request->get('document');
    
                $Patient->save();
                $user->patient = $Patient->id;
                $user->save();
            }
    
            // dd('debug',  $user);
    
            
    
            return response()->json($user->load(['Patient', 'Professional']), 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function delete(Request $request, User $user)
    {
        if ($user->id == $request->user()->id) {
            return response()->json(['error' => 'Cannot delete your own account'], 422);
        }

        $user->delete();
        return response()->json(null, 204);
    }

    private function attachPicture(User $User, $uploaded_file_id)
    {
        $PictureFile = UploadedFile::find($uploaded_file_id);
    
        if ($PictureFile) {
            $local_file = \Storage::disk('local')->get("{$PictureFile->path}/{$PictureFile->filename}");
            $s3_file_path = "profile-pictures/{$User->id}";

            if (\Storage::disk('s3')->put("{$s3_file_path}/{$PictureFile->filename}", $local_file)) {
                $PictureFile->path = $s3_file_path;
                $PictureFile->is_temp = false;
                $PictureFile->save();

                $User->picture_uploaded_file_id = $PictureFile->id;
                $User->save();

                \Storage::disk('local')->delete("{$PictureFile->path}/{$PictureFile->filename}");
            }
        }
    }
}
