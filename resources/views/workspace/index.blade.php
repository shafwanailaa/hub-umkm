<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace - HubUMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-gray-900 antialiased flex justify-center">

    <div class="w-full max-w-md bg-white min-h-screen shadow-2xl relative flex flex-col" 
         x-data="{ 
            tab: 'catatan',
            showNoteModal: false,
            showTaskModal: false,
            newNoteTitle: '',
            newNoteBody: '',
            newTaskTitle: '',
            notes: [],
            tasks: [],
            addNote() {
                if(this.newNoteTitle.trim() === '') return;
                this.notes.unshift({
                    title: this.newNoteTitle,
                    body: this.newNoteBody,
                    date: new Date().toLocaleDateString('id-ID')
                });
                this.newNoteTitle = '';
                this.newNoteBody = '';
                this.showNoteModal = false;
            },
            addTask() {
                if(this.newTaskTitle.trim() === '') return;
                this.tasks.unshift({
                    title: this.newTaskTitle,
                    done: false,
                    date: new Date().toLocaleDateString('id-ID')
                });
                this.newTaskTitle = '';
                this.showTaskModal = false;
            }
         }">
        
        <header class="bg-white border-b border-gray-100 px-6 py-5 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-2xl font-[900] text-[#9333EA] tracking-tighter leading-none">Workspace</h2>
            <button class="text-gray-400">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </header>

        <main class="p-6 space-y-6 flex-grow mb-24">
            
            <div class="bg-white p-1 rounded-2xl border border-gray-100 shadow-sm flex gap-2">
                <button @click="tab = 'catatan'" :class="tab === 'catatan' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-md' : 'text-gray-400'" class="flex-1 py-3 rounded-xl flex items-center justify-center gap-2 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    <span class="text-xs font-black">Catatan</span>
                </button>
                <button @click="tab = 'tasks'" :class="tab === 'tasks' ? 'bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white shadow-md' : 'text-gray-400'" class="flex-1 py-3 rounded-xl flex items-center justify-center gap-2 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
                    <span class="text-xs font-black">Tasks</span>
                </button>
            </div>

            <button @click="tab === 'catatan' ? showNoteModal = true : showTaskModal = true" class="w-full py-4 bg-gradient-to-r from-[#9333EA] to-[#E879F9] text-white font-[900] text-lg rounded-2xl shadow-lg shadow-purple-100 hover:scale-[1.01] active:scale-[0.95] transition-all">
                <span x-show="tab === 'catatan'">+ Tambah Catatan</span>
                <span x-show="tab === 'tasks'" x-cloak>+ Tambah Task</span>
            </button>

            <div class="bg-white border border-gray-100 rounded-[32px] p-5 flex flex-col justify-center shadow-sm min-h-[250px]">
                
                <div x-show="tab === 'catatan'" class="w-full space-y-4">
                    <div x-show="notes.length === 0" class="flex flex-col items-center animate-fade-in py-8">
                        <div class="w-20 h-20 bg-orange-50 rounded-full flex items-center justify-center text-orange-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </div>
                        <p class="text-sm font-bold text-gray-300">Belum ada catatan</p>
                    </div>

                    <div class="space-y-3" x-show="notes.length > 0" x-cloak>
                        <template x-for="note in notes">
                            <div class="bg-[#FDF2FF]/40 border border-purple-50 p-4 rounded-2xl space-y-1 shadow-sm">
                                <div class="flex justify-between items-start">
                                    <h4 class="text-xs font-black text-gray-800" x-text="note.title"></h4>
                                    <span class="text-[9px] font-bold text-gray-300" x-text="note.date"></span>
                                </div>
                                <p class="text-[11px] font-semibold text-gray-400 leading-relaxed" x-text="note.body"></p>
                            </div>
                        </template>
                    </div>
                </div>

                <div x-show="tab === 'tasks'" class="w-full space-y-4" x-cloak>
                    <div x-show="tasks.length === 0" class="flex flex-col items-center animate-fade-in py-8">
                        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center text-blue-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
                        </div>
                        <p class="text-sm font-bold text-gray-300">Belum ada Task</p>
                    </div>

                    <div class="space-y-2" x-show="tasks.length > 0" x-cloak>
                        <template x-for="task in tasks">
                            <div class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" x-model="task.done" class="w-4 h-4 rounded border-gray-200 text-[#9333EA] focus:ring-[#9333EA]">
                                    <span :class="task.done ? 'line-through text-gray-300 font-normal' : 'text-gray-800 font-bold'" class="text-xs" x-text="task.title"></span>
                                </div>
                                <span class="text-[9px] font-bold text-gray-300" x-text="task.date"></span>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </main>

        <div class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center p-5" x-show="showNoteModal" x-cloak x-transition>
            <div class="bg-white rounded-[24px] w-full max-w-xs p-5 space-y-4 shadow-2xl" @click.away="showNoteModal = false">
                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                    <h3 class="text-xs font-black text-gray-800 uppercase tracking-wide">Buat Catatan</h3>
                    <button @click="showNoteModal = false" class="text-gray-400 text-xs font-bold">✕</button>
                </div>
                <div class="space-y-3">
                    <input type="text" x-model="newNoteTitle" placeholder="Judul catatan..." class="w-full bg-gray-50 border border-gray-100 p-3 rounded-xl text-xs font-bold text-gray-700 focus:outline-none">
                    <textarea x-model="newNoteBody" rows="4" placeholder="Ketik isi catatan di sini..." class="w-full bg-gray-50 border border-gray-100 p-3 rounded-xl text-xs font-semibold text-gray-700 resize-none focus:outline-none"></textarea>
                </div>
                <button @click="addNote()" class="w-full py-3 bg-[#9333EA] text-white rounded-xl text-xs font-black uppercase tracking-wider">Simpan Catatan</button>
            </div>
        </div>

        <div class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center p-5" x-show="showTaskModal" x-cloak x-transition>
            <div class="bg-white rounded-[24px] w-full max-w-xs p-5 space-y-4 shadow-2xl" @click.away="showTaskModal = false">
                <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                    <h3 class="text-xs font-black text-gray-800 uppercase tracking-wide">Buat Task Baru</h3>
                    <button @click="showTaskModal = false" class="text-gray-400 text-xs font-bold">✕</button>
                </div>
                <input type="text" x-model="newTaskTitle" placeholder="Agenda kegiatan..." class="w-full bg-gray-50 border border-gray-100 p-3 rounded-xl text-xs font-bold text-gray-700 focus:outline-none">
                <button @click="addTask()" class="w-full py-3 bg-[#9333EA] text-white rounded-xl text-xs font-black uppercase tracking-wider">Simpan Agenda</button>
            </div>
        </div>

        <nav class="fixed bottom-0 w-full max-w-md bg-white border-t border-gray-100 z-50 px-4 py-3 flex justify-between items-end h-20 pb-4 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
    
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('dashboard') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('dashboard'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('dashboard') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Home</span>
            </a>

            <a href="{{ route('products.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('products.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('products.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('products.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Produk</span>
            </a>

            <a href="{{ route('orders.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('orders.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('orders.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('orders.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Order</span>
            </a>

            <a href="{{ route('finance.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('finance.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('finance.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('finance.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Keuangan</span>
            </a>

            <a href="{{ route('workspace.index') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('workspace.index') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('workspace.index'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('workspace.index') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Workspace</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-end w-full gap-1 {{ request()->routeIs('profile.edit') ? 'text-[#9333EA]' : 'text-gray-300 pb-1.5' }} leading-none text-center">
                @if(request()->routeIs('profile.edit'))
                    <div class="bg-[#9333EA] p-2.5 rounded-2xl text-white shadow-lg shadow-purple-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                @endif
                <span class="text-[8px] {{ request()->routeIs('profile.edit') ? 'font-[900]' : 'font-bold' }} uppercase tracking-tighter">Profile</span>
            </a>
        </nav>
    </div>

</body>
</html>