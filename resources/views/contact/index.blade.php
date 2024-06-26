@extends('layouts.secound')

@section('title', 'Contact Us - Asset Movies')

@section('styles')
@vite([
'resources/css/contact.css'
])
@stop

@section('scripts')
@vite([])
@stop

@section('content')
<div class="main_tag">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We love hearing from our users! If you have any questions, feedback, or need support, please feel free to
            reach out to us through any of the following methods:</p>

        <h2>Email</h2>
        <p>You can email us directly at: <a href="#">assettec.gl@gmail.com</a></p>

        <h2>Contact Form</h2>
        <div class="con-form">
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jonh Bear" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Send Message</button>
            </form>
        </div>
        <!-- <h2>Social Media</h2>
        <p>Stay connected with us on social media for the latest updates and news:</p> -->
    </div>
</div>
@stop