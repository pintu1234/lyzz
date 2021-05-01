@extends('layouts.master')
@section('content')
    <!-- Contact -->
    <div class="full-width contact-container">
        <h1>Contact</h1>
        <form>
            <ul>
                <li><input type="text" placeholder="YOUR NAME" name="full_name" id="contact_name" onkeypress="remove_error(this.id)"></li>
                <li><input type="email" placeholder="EMAIL" name="email" id="contact_email" onkeypress="remove_error(this.id)"></li>
                <li><input type="tel" placeholder="PHONE" name="phone" id="contact_number" onkeypress="remove_error(this.id)" maxlength="15"></li>
                <li><textarea placeholder="MESSAGE"></textarea></li>
                <li><a id="contact_btn">SUBMIT</a></li>
            </ul>
        </form>
    </div>

   
@endsection
