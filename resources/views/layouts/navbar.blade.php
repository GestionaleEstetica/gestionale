          <!-- /.navbar-header -->
            <div class="navbar-default sidebar" role="navigation" style="margin-top: 0">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="font-size: 19px">
                        <li class="sidebar-search">
                                <div style="text-align:center; font-weight: bold; font-size:23px; color:#630070;">Gestione<br> Estetica Galante</div>
                                <span class="input-group-btn">
                                </span>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/">
                                <i class="fa fa-calendar fa-fw"></i> Appuntamenti</a>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-users fa-fw"></i> Clienti<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/clients/create">Aggiungi</a>
                                </li>
                                <li>
                                    <a href="/clients/recent">Aggiunti di recente</a>
                                </li>
                                <li>
                                    <a href="/clients">Mostra tutti</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cubes fa-fw"></i> Prodotti<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/products/create">Aggiungi</a>
                                </li>
                                <li>
                                    <a href="/products">Mostra tutti</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-signing fa-fw"></i> Trattamenti<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/treatments/create">Aggiungi</a>
                                </li>
                                <li>
                                    <a href="/treatments">Mostra tutti</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-shopping-bag fa-fw"></i> Vendite<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/sales/create">Aggiungi</a>
                                </li>
                                <li>
                                    <a href="/sales/recent">Aggiunte di recente</a>
                                </li>
                                <li>
                                    <a href="/sales">Mostra tutte</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-area-chart fa-fw"></i> Admin<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/admin/stats">Statistiche</a>
                                    </li>
                                    <li>
                                        <a href="/admin/users">Mostra Utenti</a>
                                    </li>
                                    <li>
                                        <a href="/admin/users/create">Aggiungi Utente</a>
                                    </li>
                                    @guest
                                    @else <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
                                    </li>
                                    @endguest
                              </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
