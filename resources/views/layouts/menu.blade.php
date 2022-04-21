<li class="nav-item {{ Request::is('backend/documentTypes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.documentTypes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Document Types</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/genders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.genders.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Genders</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/municipalities*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.municipalities.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Municipalities</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/departments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.departments.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Departments</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/discounts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.discounts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Discounts</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/ivas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.ivas.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Ivas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/banks*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.banks.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Banks</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/typeVehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.typeVehicles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Type Vehicles</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/quotas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.quotas.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Quotas</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/vehicles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.vehicles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Vehicles</span>
    </a>
</li>
<li class="nav-item {{ Request::is('backend/typeAccounts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.typeAccounts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Type Accounts</span>
    </a>
</li>
