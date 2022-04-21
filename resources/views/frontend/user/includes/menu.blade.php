<div class="btn-group btn-group-toggle" data-toggle="buttons">

    <a class="btn button {{ request()->route()->uri == 'OwnerDriver' ? 'active' : '' }}"
        href="{{ route('indexOwnerD') }}" name="conductorPropietario" id="conductorPropietario">
        Soy
        conductor quiero ser propietario</a>
    <a class="button btn {{ request()->route()->uri == 'Owner' ? 'active' : '' }}" href="{{ route('indexOwner') }}"
        name="propietario" id="propietario"> Quiero ser
        propietario no soy conductor</a>

    <a class="button btn {{ request()->route()->uri == 'Driver' ? 'active' : '' }}" href="{{ route('indexDriver') }}"
        name="conductor" id="conductor"> Soy conductor quiero
        trabajar</a>

    <a class="button btn {{ request()->route()->uri == 'Service' ? 'active' : '' }}"
        href="{{ route('indexService') }}" name="options" id="servicio">Servicio de entrega</a>

    <a class="button btn {{ request()->route()->uri == 'guide-query' ? 'active' : '' }}"
        href="{{ route('guide-query') }}" name="query" id="guide_query">Consultar guía</a>
</div>
