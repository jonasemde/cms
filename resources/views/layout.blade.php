<!doctype html>
<html lang="{{ Statamic::cpLocale() }}" dir="{{ Statamic::cpDirection() }}" class="{{ $user->preferredTheme() === 'dark' ? 'dark' : '' }}">
<head>
    @include('statamic::partials.head')
</head>

<body>
    <div id="statamic">

        @include('statamic::partials.session-expiry')
        @include('statamic::partials.licensing-alerts')
        @include('statamic::partials.global-header')

        <div id="main"
            class="@yield('content-class')"
            :class="{
                'nav-closed': ! navOpen,
                'nav-mobile-open': mobileNavOpen,
                'showing-license-banner': showBanner
            }"
        >
            @include('statamic::partials.nav-main')
            @include('statamic::partials.nav-mobile')

            <div class="workspace">
                <div class="page-wrapper" :class="wrapperClass">
                    @yield('content')
                </div>
            </div>

        </div>

        <component
            v-for="component in appendedComponents"
            :key="component.id"
            :is="component.name"
            v-bind="component.props"
            v-on="component.events"
        ></component>

        <keyboard-shortcuts-modal></keyboard-shortcuts-modal>

        <portal-targets></portal-targets>

    </div>

    @include('statamic::partials.scripts')
    @yield('scripts')

    <div id="portals" class="portal-targets"></div>
</body>
</html>
