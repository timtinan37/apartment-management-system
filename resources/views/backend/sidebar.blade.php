
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
                                @canany(['create transaction', 'view transaction'])
                                    <li class="app-sidebar__heading">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        <a href="#">Transactions<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                        <ul>
                                            @can('view transaction')
                                                <li>
                                                    <a href="{{ route('dashboard.transactions.index') }}">
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('create transaction')
                                                <li>
                                                    <a href="{{ route('dashboard.transactions.create') }}">
                                                        Create
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcanany
                                @canany(['create asset', 'view asset'])
                                    <li class="app-sidebar__heading">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        <a href="#">Assets<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                        <ul>
                                            @can('view asset')
                                                <li>
                                                    <a href="{{ route('dashboard.assets.index') }}">
                                                        List
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('create asset')
                                                <li>
                                                    <a href="{{ route('dashboard.assets.create') }}">
                                                        Create
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcanany
                                <li class="app-sidebar__heading">
                                    <i class="metismenu-icon pe-7s-pin"></i>
                                    <a href="#">Staffs<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                    @canany(['create resident-staff', 'view resident-staff'])
                                        <ul>
                                            <li>
                                                <a href="#">Resident Staffs<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                                <ul>
                                                    @can('view resident-staff')
                                                        <li>
                                                            <a href="{{ route('dashboard.resident-staffs.index') }}">
                                                                List
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('create resident-staff')
                                                        <li>
                                                            <a href="{{ route('dashboard.resident-staffs.create') }}">
                                                                Create
                                                            </a>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </li>
                                        </ul>
                                    @endcanany
                                    @canany(['create building-staff', 'view building-staff'])
                                        <ul>
                                            <li>
                                                <a href="#">Building Staffs<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                                <ul>
                                                    @can('view building-staff')
                                                        <li>
                                                            <a href="{{ route('dashboard.building-staffs.index') }}">
                                                                List
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('create building-staff')
                                                        <li>
                                                            <a href="{{ route('dashboard.building-staffs.create') }}">
                                                                Create
                                                            </a>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </li>
                                        </ul>
                                    @endcanany
                                </li>
                            </ul>