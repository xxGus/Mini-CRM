<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 03/04/2018
 * Time: 21:51
 */
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('storage/bower_components/admin-lte/dist/img/user2-160x160.jpg')}}"
                     class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview {{(Request::is('companies/*') || Request::path() == 'companies') ? 'active' : ''}}">
                <a href="#"><i class="fa fa-link"></i> <span>Company</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/companies/create')}}">Create</a></li>
                    <li><a href="{{url('/companies')}}">List</a></li>
                </ul>
            </li>

            <li class="treeview {{(Request::is('employees/*') || Request::path() == 'employees') ? 'active' : ''}}">
                <a href="#"><i class="fa fa-link"></i> <span>Employee</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/employees/create')}}">Create</a></li>
                    <li><a href="{{url('/employees')}}">List</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>