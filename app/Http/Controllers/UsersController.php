<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\User\UpdateUserProfileRequest;

use Auth;

use App\Models\User;

class UsersController extends Controller
{
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function editProfile()
  {
      if(!auth()->user()) {
          return redirect()->route('login');
      }
      return view('users.create')->with(['user' => auth()->user()]);
  }


  /**
   * Update the specified resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function updateProfile(UpdateUserProfileRequest $request, User $user)
  {

      $user = auth()->user();

      $data = $request->only(['name', 'email', 'about', 'address', 'phone', 'mobile', 'status']);

      $user->update($data);

      session()->flash('success', 'Your Profile updated sucessfully.');

      return redirect(route('home'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $user = User::withTrashed()->where('id', $id)->firstOrFail();

      if($user) {

          if($user->trashed()) {

              $user->forceDelete();

          } else {
              $user->delete();
          }
      } 
      return redirect(route('home'));
  }

  /**
   * @param Request $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function logout(Request $request)
  {
      Auth::guard('web')->logout();
      $request->session()->invalidate();
      return redirect()->route('login');
  }

}
