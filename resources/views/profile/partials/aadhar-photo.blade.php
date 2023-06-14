<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Aadhar View') }}
        </h2>

    </header>


    @php
    if(isset($user->userDetail->aadhar_f)){
        $aadhar_f = env('APP_URL').'/storage/'.$user->userDetail->aadhar_f;
    }else {
        $aadhar_f = "https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg";
    }
    if(isset($user->userDetail->aadhar_b)){
        $aadhar_b = env('APP_URL').'/storage/'.$user->userDetail->aadhar_b;
    }else {
        $aadhar_b = "https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg";
    }
@endphp
<div class=" w-64">
    <img class="object-fill" src="{{@$aadhar_f }}" />
</div>
<div class=" w-64">
    <img class="object-fill" src="{{@$aadhar_b }}" />
</div>
</section>
