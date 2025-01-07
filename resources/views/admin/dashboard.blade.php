<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('管理員面板') }}
    </h2>
</x-slot>

<div class="py-12 bg-gray-800">  <!-- 修改背景顏色為深灰色 -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">  <!-- 深色背景 -->
            <div class="p-6 text-gray-100">  <!-- 文字顏色設為淺色 -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-lg text-white">用戶意見</h3> <!-- 白色文字 -->
                    <a href="{{ route('admin.dashboard') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md">
                        回到主頁
                    </a>
                </div>

                @if($complaints->isEmpty())
                    <p class="text-gray-400">目前沒有任何用戶意見。</p> <!-- 使用灰色的文字 -->
                @else
                    <div class="overflow-x-auto rounded-lg shadow-lg">
                        <table class="min-w-full bg-gray-800 text-white border border-gray-300 rounded-lg shadow-sm">
                            <thead class="bg-indigo-600 dark:bg-indigo-800">
                            <tr>
                                <th class="py-3 px-6 border-b text-left text-gray-200">用戶名稱</th>
                                <th class="py-3 px-6 border-b text-left text-gray-200">意見內容</th>
                                <th class="py-3 px-6 border-b text-left text-gray-200">提交時間</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($complaints as $complaint)
                                <tr class="hover:bg-indigo-700 dark:hover:bg-indigo-600">
                                    <td class="py-4 px-6 border-b">{{ $complaint->user->name ?? '匿名' }}</td>
                                    <td class="py-4 px-6 border-b">{{ $complaint->message }}</td>
                                    <td class="py-4 px-6 border-b">{{ $complaint->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
