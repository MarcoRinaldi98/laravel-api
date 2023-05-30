<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" aria-current="page">
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.projects.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.projects.edit' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.projects.show' ? 'active' : '' }}">
                Projects
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.types.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.types.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.types.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'admin.types.edit' ? 'active' : '' }}">
                Types
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.technologies.index') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.technologies.index' ? 'active' : '' }}">
                Technologies
            </a>
        </li>
    </ul>
</div>
