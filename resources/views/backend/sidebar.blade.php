
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">
                                    <a href="{{ route('dashboard.index') }}">
                                    Dashboard</a>
                                    <i class="metismenu-icon pe-7s-pin"></i>
                                </li>

                                @canany(['create committee', 'view committee'])
                                    <li class="app-sidebar__heading">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        <a href="#">Committees<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                        <ul>
                                            @can('view committee')
                                                <li>
                                                    <a href="{{ route('dashboard.committees.index') }}">
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('create committee')
                                                <li>
                                                    <a href="{{ route('dashboard.committees.create') }}">
                                                        Create
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcanany
                                @canany(['create flat', 'view flat'])
                                    <li class="app-sidebar__heading">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        <a href="#">Flats<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                        <ul>
                                            @can('view flat')
                                                <li>
                                                    <a href="{{ route('dashboard.flats.index') }}">
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('create flat')
                                                <li>
                                                    <a href="{{ route('dashboard.flats.create') }}">
                                                        Create
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcanany
                                @canany(['create resident', 'view resident'])
                                    <li class="app-sidebar__heading">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        <a href="#">Residents<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                        <ul>
                                            @can('view resident')
                                                <li>
                                                    <a href="{{ route('dashboard.residents.index') }}">
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('create resident')
                                                <li>
                                                    <a href="{{ route('dashboard.residents.create') }}">
                                                        Create
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcanany
                            </ul>