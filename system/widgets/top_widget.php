<?php


class top_widget
{
    public function getWidget()
    {
        global $ui, $current_date, $start_date;

        $iday = ORM::for_table('tbl_transactions')
            ->where('recharged_on', $current_date)
            ->where_not_equal('method', 'Customer - Balance')
            ->where_not_equal('method', 'Recharge Balance - Administrator')
            ->sum('price');

        if ($iday == '') {
            $iday = '0.00';
        }
        $ui->assign('iday', $iday);

        $imonth = ORM::for_table('tbl_transactions')
            ->where_not_equal('method', 'Customer - Balance')
            ->where_not_equal('method', 'Recharge Balance - Administrator')
            ->where_gte('recharged_on', $start_date)
            ->where_lte('recharged_on', $current_date)->sum('price');
        if ($imonth == '') {
            $imonth = '0.00';
        }
        $ui->assign('imonth', $imonth);

        $u_act = ORM::for_table('tbl_user_recharges')->where('status', 'on')->count();
        if (empty($u_act)) {
            $u_act = '0';
        }
        $ui->assign('u_act', $u_act);

        $u_all = ORM::for_table('tbl_user_recharges')->count();
        if (empty($u_all)) {
            $u_all = '0';
        }
        $ui->assign('u_all', $u_all);


        $c_all = ORM::for_table('tbl_customers')->count();
        if (empty($c_all)) {
            $c_all = '0';
        }
        $ui->assign('c_all', $c_all);
        // PPPoE Online
        $pppoe_online = ORM::for_table('radacct')
            ->where_null('acctstoptime')
            ->count();
        
        $ui->assign('pppoe_online', $pppoe_online);
        
        // PPPoE Offline
        $pppoe_offline = max(0, $u_act - $pppoe_online);
        
        $ui->assign('pppoe_offline', $pppoe_offline);
        
        // Router Online
        $router_online = ORM::for_table('tbl_routers')
            ->where('status', 'Online')
            ->count();
        
        $ui->assign('router_online', $router_online);
        
        // Router Offline
        $router_offline = ORM::for_table('tbl_routers')
            ->where('status', 'Offline')
            ->count();
        
        $ui->assign('router_offline', $router_offline);
        
        

        $open = ORM::for_table('tbl_tickets')
            ->where('status', 'open')
            ->count();
    
        $assigned = ORM::for_table('tbl_tickets')
            ->where('status', 'assigned')
            ->count();
    
        $progress = ORM::for_table('tbl_tickets')
            ->where('status', 'progress')
            ->count();
    
        $closed = ORM::for_table('tbl_tickets')
            ->where('status', 'closed')
            ->count();
    
        $installation = ORM::for_table('tbl_tickets')
            ->where('type', 'installation')
            ->count();
    
        $trouble = ORM::for_table('tbl_tickets')
            ->where('type', 'trouble')
            ->count();
    
        $today = ORM::for_table('tbl_tickets')
            ->where_raw("DATE(created_at)=CURDATE()")
            ->count();
    
        $month = ORM::for_table('tbl_tickets')
            ->where_raw("YEAR(created_at)=YEAR(NOW())")
            ->where_raw("MONTH(created_at)=MONTH(NOW())")
            ->count();
    
        $ui->assign('open', $open);
        $ui->assign('assigned', $assigned);
        $ui->assign('progress', $progress);
        $ui->assign('closed', $closed);
    
        $ui->assign('installation', $installation);
        $ui->assign('trouble', $trouble);
        $ui->assign('today', $today);
        $ui->assign('month', $month);
    
                
        return $ui->fetch('widget/top_widget.tpl');
    }
}
