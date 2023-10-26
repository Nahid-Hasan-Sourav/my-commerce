<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{asset('/')}}admin/assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Category Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('category.add') }}">Add Category </a>
                                </li>
                                <li>
                                    <a href="{{ route('category.manage') }}">Manage Category</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Sub-category Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('subcategory.add') }}">Add Sub-Category </a>
                                </li>
                                <li>
                                    <a href="{{ route('subcategory.manage') }}">Manage Sub-Category</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Brand Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('brand.add') }}">Add Brand </a>
                                </li>
                                <li>
                                    <a href="{{ route('brand.manage') }}">Manage Brand</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Unit Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('unit.add') }}">Add Unit </a>
                                </li>
                                <li>
                                    <a href="{{ route('unit.manage') }}">Manage Unit</a>
                                </li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Product Module</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('product.add') }}">Add Product </a>
                                </li>
                                <li>
                                    <a href="{{ route('product.manage') }}">Manage Product</a>
                                </li>

                            </ul>
                        </li>
                        {{-- <li class="nav-small-cap">--- SUPPORT</li>
                        <li> <a class="waves-effect waves-dark" href="http://eliteadmin.themedesigner.in/demos/bt4/documentation/documentation.html" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li> --}}
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
