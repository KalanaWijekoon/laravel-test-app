@extends('layouts.base')

@section('content')
        <div class="row">
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <br>
                <h4>Search User</h4>
                <form method="POST" action="/user">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <label>Hourly Rate</label>
                        <input type="number" class="form-control" step="0.01" name="rate" placeholder="Hourly Rate" required>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>


                        <select name="currencyUnit" class="form-select" required>
                            <option value="" selected>Please select a currency</option>
                            <option value="eur">EUR</option>
                            <option value="usd">USD</option>
                            <option value="gbp">GBP</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col"></div>
            @endsection
