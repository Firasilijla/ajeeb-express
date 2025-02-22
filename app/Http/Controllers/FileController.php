<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->hashName();
            $imagePath = 'images/partners/' . $filename;
    
            // تخزين الصورة في مجلد التخزين
            $file->storeAs('public/images/partners', $filename);
    
            // تخزين مسار الصورة مؤقتًا في الجلسة
            $uploadedImages = session()->get('uploaded_images', []);
            $uploadedImages[] = $imagePath;
            session()->put('uploaded_images', $uploadedImages);
    
            return response()->json([
                'path' => asset('storage/' . $imagePath),
                'message' => 'تم رفع الملف بنجاح!',
                'id' => $filename // بدلاً من ID قاعدة البيانات، نستخدم اسم الملف
            ]);
        }
    
        return response()->json(['message' => 'لم يتم العثور على أي ملف'], 400);
    }
    
    public function deleteFile($filename)
    {
        $uploadedImages = session()->get('uploaded_images', []);
    
        if (($key = array_search('images/partners/' . $filename, $uploadedImages)) !== false) {
            unset($uploadedImages[$key]);
            session()->put('uploaded_images', array_values($uploadedImages)); // إعادة ترتيب المصفوفة
    
            // // حذف الملف من التخزين
            // Storage::delete('public/images/partners/' . $filename);
        }
    
        return response()->json(['message' => 'تم حذف الصورة بنجاح!']);
    }

        
    
}
