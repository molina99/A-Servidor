<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->json()->all();
        $sql = "insert into reservations(date_reservation, date_finish, user_id, book_id)
                  values(?,?,?,?)";
        $parameters = 
        [$data['date_reservation'], 
         $data['date_finish'], 
         $data['user_id'],
         $data['book_id']];
        $response = DB::select($sql, $parameters);
        return $response;
    }

    public function update(Request $request)
    {

        $data = $request->json()->all();
        $sql = "update reservations set 
        date_reservation=?,
        date_finish=?,
        user_id=?,
        book_id=?
        where 
        id =?";
                
        $parameters = 
        [$data['date_reservation'], 
         $data['date_finish'], 
         $data['user_id'], 
         $data['book_id'],
         $data['id']];
        $response = DB::select($sql, $parameters);
        return $response;
    }

    public function delete(Request $request)
    {
        $data = $request->json()->all();
        $sql = "delete from reservations where id = ?";
                
        $parameters = [$data['id']];
        $response = DB::select($sql, $parameters);
        return $response;
    }

    public function getAll(Request $request)
    {
        $data = $request->json()->all();
        $sql = "select * from reservations";
        $response = DB::select($sql);
        return $response;

    }
}
