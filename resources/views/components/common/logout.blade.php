<div class="question ml-3">
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
        <i class="fas fa-power-off"
        onMouseOver="this.style.color='red'"
        onMouseOut="this.style.color='green'"
        data-toggle="tooltip" data-placement="top" title="Logout button"
        ></i>
    </a>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>