<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users = $this->getStudentList();
        
        return view('home.index')->with('users',$users);
    }

    //update
    function update($id, Request $request){
        $newUser = [
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];


        $users = $this->getStudentList();
        for($i=0; $i<count($users); $i++){
            if($id == $users[$i]['id']){
                $users[$i]['id'] = $newUser['id'];
                $users[$i]['name'] = $newUser['name'];
                $users[$i]['email'] = $newUser['email'];
                $users[$i]['password'] = $newUser['password'];
            }
        }
        return view('home.index')->with('users',$users);
    }

    //edit
    function edit($id){
        $users = $this->getStudentList();
        for($i=0; $i<count($users); $i++){
            if($id == $users[$i]['id']){
                $user = [
                    'id'=>$users[$i]['id'],
                    'name'=>$users[$i]['name'],
                    'email'=>$users[$i]['email'],
                    'password'=>$users[$i]['password']
                ];
                return view('home.edit', $user);
                
            }
        }
    }

    //delete
    function delete($id){
        $users = $this->getStudentList();
        for($i=0; $i<count($users); $i++){
            if($id == $users[$i]['id']){
                $user = [
                    'id'=>$users[$i]['id'],
                    'name'=>$users[$i]['name'],
                    'email'=>$users[$i]['email'],
                    'password'=>$users[$i]['password']
                ];
                return view('home.delete', $user);  
            }
        }
    }

    //Destroy
    function destroy($id, Request $request){
        $newUser = [
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];


        $users = $this->getStudentList();
        for($i=0; $i<count($users); $i++){
            if($id == $users[$i]['id']){
                $users[$i]['id'] = $users[$i]['id'];
                $users[$i]['name'] = null;
                $users[$i]['email'] = null;
                $users[$i]['password'] = null;

            }
            else{}
        }
        return view('home.index')->with('users',$users);
    }
    function details($id){
        echo $id;
    }
    function getStudentList(){
        return [
                    ['id'=>'1','name'=>'Raiyan','email'=>'raiyan@gmail.com','password'=>'016'],
                    ['id'=>'2','name'=>'Islam','email'=>'islam@gmail.com','password'=>'164'],
                    ['id'=>'3','name'=>'Rayman','email'=>'rayman@gmail.com','password'=>'894'],
                    ['id'=>'4','name'=>'Test','email'=>'test@gmail.com','password'=>'95']
                ];
    }
}
