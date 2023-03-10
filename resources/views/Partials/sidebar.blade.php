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
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'kelas') active @endif" href="{{ route('kelas.index') }}"><i
                    class="menu-icon mdi mdi-collage "></i><span>Kelas</span></a>
        </li>
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'jadwal') active @endif"
                href="{{ route('jadwal.index') }}"><i class="menu-icon mdi mdi-calendar "></i><span>Jadwal
                    Instruktur</span></a>
        </li>
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'instansi') active @endif"
                href="{{ route('instansi.index') }}"><i
                    class="menu-icon mdi mdi-xing-box "></i><span>Instansi</span></a>
        </li>
        <li>
            <a class="waves-effect @if (request()->segment(1) == 'materi') active @endif"
                href="{{ route('materi.index') }}"><i
                    class="menu-icon mdi mdi-file-document "></i><span>Materi</span></a>
        </li>
    </ul>
    <!-- /.menu js__accordion -->
</div>
