<?php
    /**
     * Set the active class to the current opened menu.
     *
     * @param  string|array $route
     * @param  string       $className
     * @return string
     */
    function isActive($route, $className = 'active')
    {
        if (is_array($route)) {
            return in_array(Route::currentRouteName(), $route) ? $className : '';
        }
        if (Route::currentRouteName() == $route) {
            return $className;
        }
        if (strpos(URL::current(), $route)) return $className;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ trans('messages.title') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('installer/img/favicon/favicon-16x16.png') }}" sizes="16x16"/>
        <link rel="icon" type="image/png" href="{{ asset('installer/img/favicon/favicon-32x32.png') }}" sizes="32x32"/>
        <link rel="icon" type="image/png" href="{{ asset('installer/img/favicon/favicon-96x96.png') }}" sizes="96x96"/>
        <link href="{{ asset('installer/css/style.min.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <div class="master">
            <div class="box">
                <div class="header">
                    <h1 class="header__title">@yield('title')</h1>
                </div>
                <ul class="step">
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelSetup::final') }}"><i class="step__icon database"></i></li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelSetup::permissions') }}"><i class="step__icon permissions"></i></li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelSetup::requirements') }}"><i class="step__icon requirements"></i></li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelSetup::environment') }}"><i class="step__icon update"></i></li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('LaravelSetup::welcome') }}"><i class="step__icon welcome"></i></li>
                    <li class="step__divider"></li>
                </ul>
                <div class="main">
                    @yield('container')
                </div>
            </div>
        </div>
    </body>
</html>
