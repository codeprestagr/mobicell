<div>
    <!-- Sync Button -->
    <button wire:click="syncProducts" class="btn btn-primary" {{ $isSyncing ? 'disabled' : '' }}>
        {{ $isSyncing ? 'Syncing...' : 'Start Sync' }}
    </button>


    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Progress Bar -->
    @if ($isSyncing)
        <!-- Εμφάνιση προόδου -->
        <div wire:poll>
            <p>Συγχρονισμός: {{ $progress }}%</p>
        </div>

        <!-- Μήνυμα ολοκλήρωσης -->
        @if ($message)
            <div class="alert alert-success">{{ $message }}</div>
        @endif
    @endif


</div>

@push('scripts')
    <script>
        Livewire.on('sync-start', () => {
            console.log('Sync has started');
        });

    </script>
@endpush
