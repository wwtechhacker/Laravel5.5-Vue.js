@extends('layouts.admin-site', ['bodyClass' => ''])

@section ('content')
    <div class="row column small-12">
        <div class="margin-top-2">
            <h2>Users
                <small class="margin-left-1">
                    <button class="button" data-open="addUserModal">+</button>
                </small>
            </h2>
        </div>
        <div class="scrolling">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['role']}}</td>
                        <td><a href="/admin/login/{{$user['id']}}">Login</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="reveal bg-white" id="addUserModal" data-reveal data-close-on-click="false">
        <h3>User Registration</h3>
        <form id="add-user-form" action="/admin/users" method="post" data-abide novalidate>
            {{ csrf_field() }}
            <div data-abide-error class="alert callout margin-bottom-1" style="display: none;">
                <p><i class="fi-alert"></i> There are some errors in your form.</p>
            </div>
            <label>
                Name
                <input type="text" name="name" required/>
            </label>
            <label>
                Email
                <input type="text" id="emailField" name="email" required pattern="email"/>
                <span class="form-error" data-form-error-for="emailField">Please enter a valid email.</span>
            </label>
            <label>
                Password
                <input type="password" name="password" id="passwordField" required data-validator="min_length" data-min-length="10"/>
                <span class="form-error" data-form-error-for="passwordField">Minimum length of 10 characters is required.</span>
            </label>
            <label>
                <select name="role" id="role">
                    <option value="admin">admin</option>
                    <option value="manager">manager</option>
                </select>
            </label>
            <div class="margin-top-2">
                <input type="submit" class="button" value="Add User" required/>
            </div>
        </form>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@stop

@push('scripts')
