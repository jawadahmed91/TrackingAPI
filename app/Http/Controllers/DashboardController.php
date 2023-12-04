<?php

namespace App\Http\Controllers;

use App\Models\AppStaff;
use App\Models\AppUser;
use App\Models\InvoiceSetting;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function accounts(Request $request)
    {
        $parent_page = "Setting";
        $page_name = "Account";

        return view('dashboard.accounts', ['parent_page' => $parent_page, 'page_name' => $page_name]);
    }

    public function company_profile(Request $request)
    {
        $parent_page = "Setting";
        $page_name = "Company Profile";
        $admin_id = $request->session()->get('admin_id');
        $all_staffs = AppStaff::where('admin_id', $admin_id)->get();
        $admin_detail = AppUser::where('id', $admin_id)->get()->first();
        $invoice_taxes = InvoiceSetting::where('admin_id', $admin_id)->get()->first();

        return view('dashboard.settings', ['parent_page' => $parent_page, 'page_name' => $page_name, 'all_staffs' => $all_staffs, 'admin_detail' => $admin_detail, 'invoice_taxes' => $invoice_taxes ]);
    }

    public function company_profile_edit(Request $request)
    {
        $parent_page = "Setting";
        $page_name = "Update Company Profile";
        $admin_id = $request->session()->get('admin_id');
        $all_staffs = AppStaff::where('admin_id', $admin_id)->get();
        $admin_detail = AppUser::where('id', $admin_id)->get()->first();
        $invoice_taxes = InvoiceSetting::where('admin_id', $admin_id)->get()->first();

        return view('dashboard.edit_settings', ['parent_page' => $parent_page, 'page_name' => $page_name, 'all_staffs' => $all_staffs, 'admin_detail' => $admin_detail, 'invoice_taxes' => $invoice_taxes ]);
    }

    public function update_company_setting(Request $request)
    {
        $admin_id = $request->session()->get('admin_id');
        $validated = $request->validate([
            'company_name' => 'required|min:5',
            'email' => 'required|unique:app_users,email,'.$admin_id,
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'business_number' => 'required',
            'invoice_tax' => 'required'
        ]);

        $detailupdate = AppUser::where('id', $admin_id)->update([
            'company_name'  => $request->company_name,
            'email'  => $request->email,
            'phone_number'  => $request->phone_number,
            'mobile_number'  => $request->mobile_number,
            'business_number'  => $request->business_number,
            'banking_detail'  => $request->banking_detail,
            'updated_at' => Carbon::now(),
        ]);
        if($detailupdate)
        {
            InvoiceSetting::where('admin_id', $admin_id)->update([
                'invoice_tax'  => $request->invoice_tax,
                'updated_at' => Carbon::now(),
            ]);
            
            return Redirect()->route('account.company-profile')->with('success', 'Details update successfully!');
        }else{
            return Redirect()->back()->with('message', 'Something went wrong, or connection error. Try again later.');
        }
    }
}
