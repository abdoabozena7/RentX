<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Middleware للتحقق من أن المستخدم هو المسؤول. يتم السماح
 * بالدخول إلى لوحة التحكم فقط للمستخدم الذى يحمل البريد الإلكترونى
 * admin@assaf.com. يمكن تعديل هذا الشرط لاحقاً بإضافة عمود is_admin
 * فى جدول المستخدمين.
 */
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // تحقّق أن المستخدم مسجل دخول وأن بريده يطابق حساب المسؤول
        if (!Auth::check() || Auth::user()->email !== 'admin@assaf.com') {
            return redirect()->route('home')->with('error', 'ليس لديك صلاحية للوصول إلى لوحة التحكم');
        }
        return $next($request);
    }
}