<?php

namespace App\Http\Controllers;

use App\Http\Requests\WhatWeDoRequest;
use App\Models\WhatWeDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WhatWeDoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // استرجاع البيانات من الموديل
            $data = WhatWeDo::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <td class="text-right pr-0">
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-icon btn-light btn-hover-danger btn-sm delete-WhatWeDo">
                                    <span class="svg-icon svg-icon-md svg-icon-danger">
                                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                               <rect x="0" y="0" width="24" height="24"></rect>
                                               <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                               <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                           </g>
                                       </svg>
                                    </span>
                                </a>
                                <a data-toggle="modal" data-target="#edit-exampleModalSizeXl" href="javascript:void(0)" class="btn btn-icon btn-light btn-hover-success btn-sm edit-WhatWeDo" data-id="' . $row->id . '">
                                    <span class="svg-icon svg-icon-md svg-icon-success">
                                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                   <rect x="0" y="0" width="24" height="24"></rect>
                                                   <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                   <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                               </g>
                                           </svg>
                                    </span>
                                </a>
                            </div>
                        </td>';
                })
                ->addColumn('image', function ($row) {
                    $url = asset('storage/' . $row->image);  // المسار الكامل للصورة في التخزين
                    return '<img src="' . $url . '" width="50" height="50" alt="photo">';  // عرض الصورة بأبعاد محددة
                })
                ->addColumn('title', function ($row) {
                    // الحصول على الترجمة للعنوان بناءً على اللغة الحالية
                    $translation = $row->getTranslation('title');
                    return $translation ? $translation->title : $row->title;  // إذا كانت الترجمة موجودة نعرضها، وإلا نعرض العنوان الأصلي
                })
                ->addColumn('description', function ($row) {
                    // الحصول على الترجمة للوصف بناءً على اللغة الحالية
                    $translation = $row->getTranslation('description');
                    return $translation ? $translation->description : $row->description;  // إذا كانت الترجمة موجودة نعرضها، وإلا نعرض الوصف الأصلي
                })
                ->rawColumns(['action', 'image'])  // تأكد من أن الأعمدة التي تحتوي على HTML تُعرض بشكل صحيح
                ->make(true);
        }

        return view('Admin.WhatWeDo.index');  // عرض الصفحة الرئيسية
    }



    public function store(WhatWeDoRequest $request)
    {
        DB::beginTransaction();
        try {
            // مسار الصورة
            $imagePath = "";

            if ($request->has("WhatWeDoImage")) {
                $file = $request->file('WhatWeDoImage');
                $filename = $file->hashName();
                $imagePath = 'images/WhatWeDo/' . $filename; // تخزين الصورة في المسار الصحيح
                $file->storeAs('public/images/WhatWeDo', $filename);  // تخزين الصورة في مجلد "public/images/WhyUs"
            }

            // تخزين البيانات في جدول WhyUs باستخدام create()
            $WhatWeDo = WhatWeDo::create([
                'image' => $imagePath,

            ]);

            // إضافة الترجمات
            $WhatWeDo->translations()->create([
                'language' => 'en',
                'title' => $request->title_en,
                'description' => $request->description_en
            ]);

            $WhatWeDo->translations()->create([
                'language' => 'ar',
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $ex->getMessage()]);
        }

        return response()->json(['status' => '1', 'msg' => 'تم إضافة العنصر بنجاح']);
    }



    public function edit($id)
    {
        $WhatWeDo = WhatWeDo::findOrFail($id);
        $translations = $WhatWeDo->translations;  // الحصول على الترجمات إذا كانت موجودة في جدول منفصل

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $WhatWeDo->id,
                'title_ar' => $translations->where('language', 'ar')->first()->title ?? '',
                'title_en' => $translations->where('language', 'en')->first()->title ?? '',
                'description_ar' => $translations->where('language', 'ar')->first()->description ?? '',
                'description_en' => $translations->where('language', 'en')->first()->description ?? '',
                'image' => $WhatWeDo->image ?? 'default.jpg', // تأكد من وجود الصورة
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
        ]);

        DB::beginTransaction(); // بداية المعاملة

        try {
            $WhatWeDo = WhatWeDo::findOrFail($id); // البحث عن السجل باستخدام الـ id

            // تحديث الصورة إذا تم رفع صورة جديدة
            $imagePath = $WhatWeDo->image;  // المسار القديم للصورة

            if ($request->hasFile('WhatWeDoImage')) {
                // مسار الحذف للصورة القديمة (من المجلد public/images/WhyUs)
                $oldImagePath = 'public/' . $WhatWeDo->image;

                // التحقق من وجود الصورة القديمة قبل الحذف
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);  // حذف الصورة القديمة
                }

                // تخزين الصورة الجديدة
                $file = $request->file('WhatWeDoImage');
                $filename = $file->hashName();  // الحصول على اسم الملف
                $imagePath = 'images/WhatWeDo/' . $filename;  // مسار الصورة الجديد

                // تخزين الصورة في المسار الصحيح
                $file->storeAs('public/images/WhatWeDo', $filename);
            }

            // تحديث سجل why_us مع المسار الجديد للصورة
            $WhatWeDo->update([
                'image' => $imagePath,
            ]);

            // تحديث الترجمات
            $WhatWeDo->translations()->where('language', 'en')->update([
                'title' => $request->title_en,
                'description' => $request->description_en
            ]);

            $WhatWeDo->translations()->where('language', 'ar')->update([
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ]);

            DB::commit(); // إتمام المعاملة

            return response()->json([
                'status' => '1',
                'msg' => 'تم التحديث بنجاح',
                'success' => $WhatWeDo
            ]);
        } catch (\Exception $ex) {
            DB::rollBack(); // التراجع عن المعاملة في حال حدوث خطأ

            // طباعة تفاصيل الخطأ للمساعدة في التشخيص
            return response()->json([
                'status' => '0',
                'msg' => 'حدث خطأ، الرجاء التحقق من البيانات',
                'error' => $ex->getMessage()  // إضافة تفاصيل الخطأ
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            // البحث عن العنصر باستخدام الـ ID
            $Service = WhatWeDo::findOrFail($id);

            // حذف الصورة المرتبطة إذا كانت موجودة
            if (file_exists(public_path('storage/images/WhatWeDo/' . $Service->image))) {
                unlink(public_path('storage/images/WhatWeDo/' . $Service->image));
            }

            // حذف الـ WhyUs
            $Service->delete();

            return response()->json(['status' => '1', 'msg' => 'تم الحذف بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['status' => '0', 'msg' => 'فشلت عملية الحذف: ' . $e->getMessage()]);
        }
    }}
