@props(['candidate', 'job'])
<div x-data="{ openModal: false }">
    <div>
        <div class="flex items-center gap-4 mb-4 justify-center flex-col">
            <img src="{{ asset('storage/' . $candidate->profile_photo) }}"
                class="w-16 h-16 rounded-full object-cover border">
            <div>
                <h3 class="text-lg font-medium text-gray-800">{{ $candidate->name }}</h3>
                <p class="text-sm text-gray-600">{{ $candidate->email }}</p>
                <p class="text-sm text-gray-600">{{ $candidate->phone }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg p-4 border">
            @php
                $colors = [
                    'approved' => 'text-green-600 bg-green-100',
                    'rejected' => 'text-red-600 bg-red-100',
                    'applied' => 'text-yellow-600 bg-yellow-100',
                    'interview' => 'text-blue-600 bg-blue-100',
                ];

                $status = $candidate->pivot->status;
                $statusColor = $colors[$status] ?? 'text-gray-600 bg-gray-100';
            @endphp

            <p class="text-sm text-gray-700">
                <span class="font-semibold">Status:</span>
                <span
                    class="uppercase px-2 py-1 rounded {{ $statusColor }}">{{ $candidate->pivot->status_label }}</span>
            </p>
            @if ($candidate->pivot->message)
                <p class="text-sm text-gray-700 mt-2">
                    <span class="font-semibold">Mensagem enviada:</span><br>
                    {{ $candidate->pivot->message }}
                </p>
            @endif
            <p class="text-xs text-gray-500 mt-3">
                Candidatou-se em: {{ date('d/m/Y H:i', strtotime($candidate->pivot->created_at)) }}
            </p>
        </div>

        {{-- BUTTONS --}}
        <div class="flex justify-between ">
            <div class="mt-auto flex justify-between items-center absolute bottom-1 mx-2">
                <div class="flex gap-2 mr-20">
                    <button @click ="openModal = true"
                        class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                        Aceitar
                    </button>
                    <form action="{{ route('updateStatus', $candidate->pivot->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                            Rejeitar
                        </button>
                    </form>

                </div>
                @if ($candidate->resume)
                    <a href="{{ route('resume.download', ['job_offer_id' => $job->id, 'candidate_id' => $candidate->id]) }}"
                        target="_blank"
                        class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Ver CV
                    </a>
                @endif
            </div>
        </div>
    </div>


    <div x-show="openModal" class="fixed inset-0 bg-black/50 flex items-center justify-center p-4 z-50" x-transition>

        <div class="bg-white rounded-xl p-6 w-full max-w-lg shadow-xl">

            <h2 class="text-xl font-semibold mb-4">Mensagem para o candidato</h2>

            <form action="{{ route('updateStatus', $candidate->pivot->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <input type="hidden" name="status" value="approved">

                <textarea name="company_message" rows="4" class="w-full border rounded-lg p-2"
                    placeholder="Escreva instruções, local, horário, documentos necessários...">{{ $candidate->pivot->company_message }}</textarea>

                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" @click="openModal = false"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Cancelar
                    </button>

                    <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Enviar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
