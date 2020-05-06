@php
 $personal = isset($personal) ? 'active' : 'transition-link' ;
 $edit = isset($edit) ? 'active' : 'transition-link' ;
 $reserve = isset($reserve) ? 'active' : 'transition-link' ;
 $userReview = isset($userReview) ? 'active' : 'transition-link' ;
 $userPass = isset($userPass) ? 'active' : 'transition-link' ;
@endphp
<div class="admin-nav nav flex-column nav-pills" aria-orientation="vertical">
  <a class="nav-link {{$personal}}" href="{{route('personal.information' , $user->id)}}"> <i class="fas fa-user-circle mr-2"></i>Personal Information</a>
  <a class="nav-link {{$edit}}" href="{{route('edit.information' , $user->id)}}"> <i class="fas fa-user-edit mr-2"></i>Edit my Information</a>
  <a class="nav-link {{$reserve}}" href="{{route('booking.bookings')}}"> <i class="fas fa-calendar-minus mr-2"></i>My Bookings</a>
  <a class="nav-link {{$userReview}}" href="{{route('personal.review' , $user->id)}}"> <i class="fas fa-star mr-2"></i>My Reviews</a>
  <a class="nav-link {{$userPass}}" href="{{route('change.password' , $user->id)}}"> <i class="fas fa-lock mr-2"></i>Change my Password</a></div>
