@extends('layouts.dashboard')

@section('title', 'Manage Site Settings')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary panel-line">
                <div class="panel-heading">
                    <h3 class="panel-title">General Settings</h3>
                </div>

                <div class="panel-body">
                    <form action="{{ action('Util\SettingsController@update', ['id' => $settings->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="gatewayID">Payment Gateway</label>
                            <select name="gatewayID" id="gatewayID" class="form-control">
                                <option value="{{ $gateway->id }}">{{ $gateway->provider_name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="site_title">Site Title</label>
                            <input type="text" class="form-control" id="site_title" name="site_title" value="{{ $settings->site_title }}">
                        </div>

                        <div class="form-group">
                            <label for="currency_code">Currency</label>
                            <input type="text" class="form-control" id="currency_code" name="currency_code" value="{{ $settings->currency_code }}">
                        </div>

                        <div class="form-group">
                            <label for="analytics_code">Google Analytics Code</label>
                            <input type="text" class="form-control" id="analytics_code" name="analytics_code" value="{{ $settings->google_analytics_code }}">
                        </div>

                        <input type="submit" class="btn btn-primary" value="UPDATE">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary panel-line">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Gateway Settings</h3>
                </div>

                <div class="panel-body">
                    <form action="#" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        
                        <div class="form-group">
                            <label for="test_url">Test URL</label>
                            <input type="text" name="test_url" id="test_url" class="form-control" value="{{ $gateway->test_url }}">
                        </div>

                        <div class="form-group">
                            <label for="production_url">Production URL</label>
                            <input type="text" name="production_url" id="production_url" class="form-control" value="{{ $gateway->production_url }}">
                        </div>

                        <div class="form-group">
                            <label for="default_config">Config</label>
                            <textarea name="default_config" id="default_config" cols="30" rows="2" class="form-control">{{ $gateway->default_config }}</textarea>
                        </div>

                        <input type="submit" class="btn btn-primary" value="UPDATE">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop