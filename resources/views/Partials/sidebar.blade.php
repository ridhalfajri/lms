<div class="navigation">
    <ul class="menu js__accordion">
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'dashboard') active @endif" href="{{ route('dashboard') }}"><i
                    class="menu-icon mdi mdi-view-dashboard "></i><span>Dashboard</span></a>
        </li>
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'user') active @endif" href="{{ route('user') }}"><i
                    class="menu-icon mdi mdi-account-multiple "></i><span>Pengguna</span></a>
        </li>
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'soal') active @endif" href="{{ route('soal.index') }}"><i
                    class="menu-icon mdi mdi-book-open "></i><span>Bank Soal</span></a>
        </li>
    </ul>
    <!-- /.menu js__accordion -->
</div>
