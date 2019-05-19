<aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">  
  
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> <span>Post</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_post.php">Posts</a></li>
              <li><a href="add_post.php">Add New Posts</a></li>
            </ul>
          </li>         
  
          <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Designation</span></a></li> -->
          <?php if(is_admin(get_username('username'))): ?>
          <li class="treeview">
            <a href="#"><i class="fa fa-id-card" aria-hidden="true"></i> <span>Category</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_category.php">Categories</a></li>
              <li><a href="add_category.php">Add New Category</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Author</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="all_author.php">Authors</a></li>
              <li><a href="add_author.php">Add Author</a></li>
            </ul>
          </li>

          <li>
            <a href="all_message.php"><i class="fa fa-envelope-o"></i> <span>Messages</span>
            </a>
          </li>

          <li>
            <a href="theme_options.php"><i class="fa fa-gear"></i> <span>Theme Options</span>
            </a>
          </li>
        <?php endif; ?>
  
          <!-- <li class="treeview">
            <a href="#"><i class="fa fa-calendar-o"></i> <span>Shifts</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="shifts.html">Shifts</a></li>
              <li><a href="add_shift.html">Add Shift</a></li>
            </ul>
          </li>

          
  
          <li class="treeview">
            <a href="#"><i class="fa fa-user-circle-o"></i> <span>Clients</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="clients.html">Clients</a></li>
              <li><a href="add_client.html">Add Client</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-user-md"></i> <span>Employees</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="employees.html">Employees</a></li>
              <li><a href="add_employee.html">Add Employee</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-user-secret "></i> <span>Admins</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="admins.html">Admins</a></li>
              <li><a href="add_admin.html">Add Admin</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Food charts</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="food_carts.html">Food charts</a></li>
              <li><a href="add_food_cart.html">Add Food chart</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-area-chart"></i> <span>Workouts</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="workouts.html">Workouts</a></li>
              <li><a href="new_workout.html">New Workout</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-usd"></i> <span>Billings</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="billings.html">Billings</a></li>
              <li><a href="new_billing.html">New Billing</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-pie-chart"></i> <span>Expenses</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="general_expenses.html">General Expenses</a></li>
              <li><a href="add_general_expense.html">Add General Expenses</a></li>
              <li><a href="salary_expenses.html">Salary Expenses</a></li>
              <li><a href="add_salary_expense.html">Add Salary Expense</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-bell"></i> <span>Reports</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="salary_report.html">Salary Report</a></li>
              <li><a href="expense_report.html">Expense Report</a></li>
              <li><a href="income_report.html">Income Report</a></li>
              <li><a href="due_report.html">Due Report</a></li>
              <li><a href="paid_report.html">Paid Report</a></li>
              <li><a href="admission_report.html">Admission Report</a></li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-newspaper-o"></i> <span>News</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="news.html">News</a></li>
              <li><a href="add_news.html">Add News</a></li>
            </ul>
          </li>
          <li>
            <a href="blog.html">
              <i class="fa fa-dashboard"></i> <span>Blog</span>
            </a>
          </li>
  
          <li class="treeview">
            <a href="#"><i class="fa fa-bell"></i> <span>Notifications</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="notifications.html">Notifications</a></li>
              <li><a href="add_notification.html">Add Notification</a></li>
            </ul>
          </li>
  
          <li class="treeview menu-open">
            <a href="#">
              <i class="fa fa-cog"></i> <span>Settings</span>
            </a>
          </li> -->
  
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>