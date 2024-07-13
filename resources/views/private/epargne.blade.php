<!-- Page d'accueil -->
@extends('layouts.page_template')
@section('title')
    Épargnes
@endsection

@section('content')
<!-- Titre de la page -->
<livewire:page-title :title="'Épargnes'" />

<!-- Messages d'erreur et de succès -->
<div class="colCenterContainer mt-8 px-4">
    @if ($errors->any())
        <div class="rowCenterContainer">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="normalTextError text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <livewire:information-message />
</div>


<!-- Contenue de la page -->
<section class="colCenterContainer space-y-12 mt-4 px-6 mb-32 bgPage">
    <!-- Information générale -->
    <div class="colCenterContainer">
        <h2 class="w-full bigTextBleuLogo text-center mb-3">Information générale</h2>
        <!-- Nombre de d'opérations d'épargne -->
        <div class="rowCenterContainer">
            <span class="normalText">Nombre d'opérations d'épargne : <span class="normalTextBleuLogo font-bold">{{ $nombreEpargnes }}</span></span>
        </div>
        <!-- Montant total épargné -->
        <div class="rowCenterContainer">
            <span class="normalText">Montant total épargné : <span class="normalTextBleuLogo font-bold">{{ number_format($montantEpargnes, 2, ',', ' ') }} €</span></span>
        </div>
    </div>

    <!-- Barre de séparation -->
    <livewire:horizontal-separation />

    <!-- Détails des salaires mois par mois -->
    <div class="colCenterContainer">
        <h2 class="w-full bigTextBleuLogo text-center mb-3">Détails des épargnes mois par mois</h2>
        <table class="w-full mt-2">
            <!-- Entête du tableau -->
            <thead class="w-full">
                <tr class="tableRow smallText text-center font-bold">
                    <th class="tableCell">Date du virement</th>
                    <th class="tableCell">Montant épargné</th>
                    <th class="tableCell">Nom de la banque</th>
                    <th class="tableCell">Nom du compte</th>
                    <th class="tableCell">Actions</th>
                </tr>
            </thead>

            <!-- Contenue du tableau -->
            <tbody class="w-full normalText">
                @if (isset($epargnes))
                    @foreach ($epargnes as $epargne)
                        <tr class="tableRow smallText text-center">
                            <!-- Date de la transaction -->
                            <td class="tableCell" title="{{ strftime('%A %d %B %Y',strtotime($epargne->date_transaction)); }}">{{ strftime('%d %B %Y',strtotime($epargne->date_transaction)); }}</td>
                            
                            <!-- Montant de la transaction -->
                            <td class="tableCell" title="{{ number_format($epargne->montant_transaction, 2, ',', ' ') }} €">{{ number_format($epargne->montant_transaction, 2, ',', ' ') }} €</td>
                            
                            <!-- Nom de la banque -->
                            <td class="tableCell" title="{{ $epargne->banque }}">{{ $epargne->banque }}</td>
                            
                            <!-- Nom du compte -->
                            <td class="tableCell" title="{{ $epargne->compte }}">{{ $epargne->compte }}</td>

                            <!-- Actions -->
                            <!-- Actions -->
                            <td class="smallRowCenterContainer px-1 min-[460px]:px-2 min-[500px]:px-4 py-2">
                                <!-- Modifier -->
                                <a href="{{ route('removeEpargne', $epargne->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le salaire du {{ strftime('%A %d %B %Y',strtotime($salaire->date_transaction)); }} ? Cette action est irréversible.')" class="smallRowCenterContainer w-fit smallTextReverse font-bold bgBleuLogo hover:bgBleuFonce focus:normalScale rounded-lg min-[500px]:rounded-xl py-1 px-1 min-[500px]:px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tinySizeIcons">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>

                                <!-- Supprimer -->
                                <a href="{{ route('removeEpargne', $epargne->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le salaire du {{ strftime('%A %d %B %Y',strtotime($salaire->date_transaction)); }} ? Cette action est irréversible.')" class="smallRowCenterContainer w-fit smallTextReverse font-bold bgError hover:bgErrorFonce focus:normalScale rounded-lg min-[500px]:rounded-xl py-1 px-1 min-[500px]:px-2 ml-1 min-[500px]:ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tinySizeIcons">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- Formulaire pour ajouter un salaire -->
        <form id="form" action="{{ route('addEpargne') }}" method="POST" class="rowStartContainer hidden">
            @csrf
            <div class="colCenterContainer">
                <div class="colStartContainer sm:rowStartContainer">
                    <input id="date_transaction"    name="date_transaction"    required type="date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" class="w-[55%] sm:w-4/12 mx-2 min-[500px]:mx-4 my-2 text-center inputForm smallText">
                    <input id="montant_transaction" name="montant_transaction" required type="number" step="0.01" placeholder="Montant du versement" min="0" class="w-[55%] sm:w-4/12 mx-2 min-[500px]:mx-4 my-2 text-center inputForm smallText">
                    <input id="banque"              name="banque"              required type="text" placeholder="Nom de la banque" class="w-[55%] sm:w-4/12 mx-2 min-[500px]:mx-4 my-2 text-center inputForm smallText">
                    <input id="compte"              name="compte"              required type="text" placeholder="Nom du compte" class="w-[55%] sm:w-4/12 mx-2 min-[500px]:mx-4 my-2 text-center inputForm smallText">
                </div>
                <button class="buttonForm mx-2 min-[500px]:mx-4 my-2">Ajouter</button>
                <div class="w-full tableRowTop"></div>
            </div>
        </form>

        <!-- Bouton pour ajouter un salaire -->
        <button onclick="showForm('Ajouter une épargne')" id="button" class="buttonForm mt-8">Ajouter une épargne</a>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/showForm.js') }}"></script>
@endsection
