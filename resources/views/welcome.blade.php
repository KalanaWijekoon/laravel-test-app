@extends('layouts.base')

@section('content')
        <!-- section start -->
        <div class="row"></div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <br>
                <h4>Search User</h4>
                <form id="getDetails">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="number" class="form-control form-control-sm" name="userID" placeholder="User ID" required>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>
                        <select name="currencyUnit" class="form-select form-select-sm" required>
                            <option value="" selected>Please select a currency</option>
                            <option value="eur">EUR</option>
                            <option value="usd">USD</option>
                            <option value="gbp">GBP</option>
                        </select>
                    </div>
                    <br>
                    <button id="submit" class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <div class="col"></div>

            <script>
                var form = document.querySelector('#getDetails');

                // Override default for submit action and send a get request for custom route
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    window.location.href = '/users/'+form.userID.value+'/'+form.currencyUnit.value;
                })
            </script>
        <!-- section end -->
@endsection
