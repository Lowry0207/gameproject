<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use Validator;

#Models
use App\User;

class RegController extends Controller {

 /**
     * Show the form for creating a new resource.
     *
     * @return Response
 */
    public function create()
    {
       return view('auth.register',$this->data);
    }

   



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = $request->only('name','password','email');
        $validator = $this->validator($user);

    if ($validator->fails())
        return redirect('/reg')->withErrors($validator)->withInput();
    

    #Создаем аккаунт
    $user['password'] = bcrypt($user['password']);
    if(User::create($user)){
      return  $this->notification('complite_reg');
    }

}

 
    private function validator(array $data){

        $rules = 
        [
            'name' => 'required|min:3|max:16',
            'email' => 'required|min:8|unique:users,email',
            'password' => 'required|min:6',
            
        ];

        $messages = [
          'required' => 'Поле :attribute не заполнено'
        ];

        return Validator::make($data, $rules, $messages);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
