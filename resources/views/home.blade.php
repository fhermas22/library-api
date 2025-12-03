<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library API - Documentation Complète</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-100">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-slate-900/80 backdrop-blur-md border-b border-slate-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white text-xl font-bold">📚</span>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Library API</h1>
                </div>
                <div class="text-sm text-slate-400">v1.0 • Laravel 12</div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="px-4 sm:px-6 lg:px-8 py-20 border-b border-slate-700">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-5xl font-bold mb-6 bg-gradient-to-r from-blue-400 via-blue-300 to-blue-500 bg-clip-text text-transparent">
                Documentation Complète de l'API
            </h2>
            <p class="text-xl text-slate-300 mb-8">
                Une API REST moderne pour gérer une bibliothèque numérique avec authentification et filtrage avancé
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <div class="px-6 py-3 bg-blue-600 rounded-lg font-semibold text-white hover:bg-blue-700 transition cursor-pointer">
                    🚀 Démarrer
                </div>
                <div class="px-6 py-3 bg-slate-700 rounded-lg font-semibold text-slate-100 hover:bg-slate-600 transition cursor-pointer">
                    📖 Explorer
                </div>
            </div>
        </div>
    </section>

    <!-- Table des matières -->
    <section class="px-4 sm:px-6 lg:px-8 py-12 bg-slate-800/50 border-b border-slate-700">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-2xl font-bold text-white mb-6">📑 Sommaire</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <a href="#authentification" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    🔐 Authentification
                </a>
                <a href="#livres" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    📕 Gestion des Livres
                </a>
                <a href="#categories" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    🏷️ Gestion des Catégories
                </a>
                <a href="#relations" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    🔗 Relations Livre-Catégorie
                </a>
                <a href="#codes" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    ℹ️ Codes HTTP
                </a>
                <a href="#erreurs" class="p-4 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition border border-slate-600">
                    ⚠️ Gestion des Erreurs
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-4 sm:px-6 lg:px-8 py-20">
        <div class="max-w-4xl mx-auto">

            <!-- AUTHENTIFICATION -->
            <div id="authentification" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-bold">🔐</div>
                    <h3 class="text-3xl font-bold text-white">1. Authentification</h3>
                </div>

                <!-- Login -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-green-900/50 text-green-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/login</code>
                    </div>
                    <p class="text-slate-300 mb-4">Authentifier un utilisateur et récupérer un token</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                            <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "email": "user@example.com",
  "password": "password"
}</code></pre>
                        </div>
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (200) :</p>
                            <pre class="text-sm text-blue-400 overflow-x-auto"><code>{
  "token": "1|abcdef...",
  "message": "Connecté avec succès"
}</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Register -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-green-900/50 text-green-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/register</code>
                    </div>
                    <p class="text-slate-300 mb-4">Créer un nouveau compte utilisateur</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                            <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}</code></pre>
                        </div>
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">✅ Validations :</p>
                            <ul class="text-sm text-yellow-400 space-y-1">
                                <li>✓ Email unique & valide</li>
                                <li>✓ Mot de passe min 8 chars</li>
                                <li>✓ Confirmation du MDP</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Logout -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/logout</code>
                    </div>
                    <p class="text-slate-300 mb-4">Déconnecter l'utilisateur (invalide le token)</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📋 Headers requis :</p>
                        <pre class="text-sm text-yellow-400 overflow-x-auto"><code>Authorization: Bearer YOUR_TOKEN
Content-Type: application/json</code></pre>
                    </div>
                </div>
            </div>

            <!-- LIVRES -->
            <div id="livres" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center font-bold">📕</div>
                    <h3 class="text-3xl font-bold text-white">2. Gestion des Livres</h3>
                </div>

                <!-- Get all books -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books</code>
                    </div>
                    <p class="text-slate-300 mb-4">Récupérer tous les livres avec pagination & filtrage</p>
                    <div class="bg-slate-900/50 rounded-lg p-4 mb-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📋 Paramètres de requête :</p>
                        <pre class="text-sm text-yellow-400 overflow-x-auto"><code>per_page=10&page=1&sort_by=title&order=asc</code></pre>
                        <p class="text-xs text-slate-500 mt-2">sort_by: title | author | year</p>
                        <p class="text-xs text-slate-500">order: asc | desc</p>
                    </div>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (200) :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "data": [
    {"id": 1, "title": "Clean Code", ...}
  ],
  "links": {...},
  "meta": {...}
}</code></pre>
                    </div>
                </div>

                <!-- Create book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-green-900/50 text-green-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books</code>
                    </div>
                    <p class="text-slate-300 mb-4">Créer un nouveau livre</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                            <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "title": "Clean Code",
  "author": "Robert Martin",
  "year": 2008,
  "description": "Handbook of agile..."
}</code></pre>
                        </div>
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">✅ Validations :</p>
                            <ul class="text-sm text-yellow-400 space-y-1">
                                <li>✓ Titre: obligatoire, min 3 chars</li>
                                <li>✓ Année: numérique, &lt; année actuelle</li>
                                <li>✓ Auteur: optionnel</li>
                                <li>✓ Description: optionnelle</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Get one book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Récupérer les détails d'un livre spécifique</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (200) :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "id": 1,
  "title": "Clean Code",
  "author": "Robert Martin",
  "year": 2008,
  "description": "...",
  "created_at": "2025-12-03T10:30:00Z"
}</code></pre>
                    </div>
                </div>

                <!-- Update book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-yellow-900/50 text-yellow-400 rounded text-sm font-semibold">PUT</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Modifier un livre existant</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "title": "Clean Code 2nd Edition",
  "year": 2010
}</code></pre>
                    </div>
                </div>

                <!-- Delete book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">DELETE</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Supprimer un livre</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (204) :</p>
                        <pre class="text-sm text-slate-400 overflow-x-auto"><code>Pas de contenu</code></pre>
                    </div>
                </div>

                <!-- Search books -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/search</code>
                    </div>
                    <p class="text-slate-300 mb-4">Chercher des livres par titre ou auteur</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">🔍 Paramètre :</p>
                        <pre class="text-sm text-yellow-400 overflow-x-auto"><code>?query=clean</code></pre>
                    </div>
                </div>
            </div>

            <!-- CATEGORIES -->
            <div id="categories" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-orange-600 rounded-lg flex items-center justify-center font-bold">🏷️</div>
                    <h3 class="text-3xl font-bold text-white">3. Gestion des Catégories</h3>
                </div>

                <!-- Get all categories -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/categories</code>
                    </div>
                    <p class="text-slate-300 mb-4">Récupérer toutes les catégories</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (200) :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>[
  { "id": 1, "name": "Fiction" },
  { "id": 2, "name": "Science" },
  { "id": 3, "name": "Développement" }
]</code></pre>
                    </div>
                </div>

                <!-- Create category -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-green-900/50 text-green-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/categories</code>
                    </div>
                    <p class="text-slate-300 mb-4">Créer une nouvelle catégorie</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                            <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "name": "Fiction"
}</code></pre>
                        </div>
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">✅ Validations :</p>
                            <ul class="text-sm text-yellow-400 space-y-1">
                                <li>✓ Nom: obligatoire, min 3 chars</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Get one category -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/categories/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Récupérer une catégorie spécifique</p>
                </div>

                <!-- Update category -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-yellow-900/50 text-yellow-400 rounded text-sm font-semibold">PUT</span>
                        <code class="text-blue-400 font-mono text-lg">/api/categories/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Modifier une catégorie</p>
                </div>

                <!-- Delete category -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">DELETE</span>
                        <code class="text-blue-400 font-mono text-lg">/api/categories/{id}</code>
                    </div>
                    <p class="text-slate-300 mb-4">Supprimer une catégorie</p>
                </div>
            </div>

            <!-- RELATIONS -->
            <div id="relations" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-cyan-600 rounded-lg flex items-center justify-center font-bold">🔗</div>
                    <h3 class="text-3xl font-bold text-white">4. Relations Livre-Catégorie</h3>
                </div>

                <!-- Get categories of a book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-blue-900/50 text-blue-400 rounded text-sm font-semibold">GET</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}/categories</code>
                    </div>
                    <p class="text-slate-300 mb-4">Récupérer toutes les catégories d'un livre</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📥 Réponse (200) :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>[
  { "id": 1, "name": "Fiction" },
  { "id": 3, "name": "Développement" }
]</code></pre>
                    </div>
                </div>

                <!-- Attach category to book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-green-900/50 text-green-400 rounded text-sm font-semibold">POST</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}/categories</code>
                    </div>
                    <p class="text-slate-300 mb-4">Attacher une catégorie à un livre (table pivot)</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                            <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "category_id": 2
}</code></pre>
                        </div>
                        <div class="bg-slate-900/50 rounded-lg p-4">
                            <p class="text-xs text-slate-400 mb-2 font-semibold">✅ Validations :</p>
                            <ul class="text-sm text-yellow-400 space-y-1">
                                <li>✓ category_id obligatoire</li>
                                <li>✓ Catégorie doit exister</li>
                                <li>✓ Pas de doublon</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Detach category from book -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">DELETE</span>
                        <code class="text-blue-400 font-mono text-lg">/api/books/{id}/categories</code>
                    </div>
                    <p class="text-slate-300 mb-4">Détacher une catégorie d'un livre</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <p class="text-xs text-slate-400 mb-2 font-semibold">📤 Requête :</p>
                        <pre class="text-sm text-green-400 overflow-x-auto"><code>{
  "category_id": 2
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- CODES HTTP -->
            <div id="codes" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-pink-600 rounded-lg flex items-center justify-center font-bold">ℹ️</div>
                    <h3 class="text-3xl font-bold text-white">5. Codes de Réponse HTTP</h3>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-green-400 mb-2">200</div>
                        <p class="text-sm text-slate-300">✅ OK - Requête réussie (GET/PUT)</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-green-400 mb-2">201</div>
                        <p class="text-sm text-slate-300">✅ Created - Ressource créée (POST)</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-green-400 mb-2">204</div>
                        <p class="text-sm text-slate-300">✅ No Content - Supprimé (DELETE)</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-yellow-400 mb-2">400</div>
                        <p class="text-sm text-slate-300">⚠️ Bad Request - Erreur de syntaxe</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-red-400 mb-2">401</div>
                        <p class="text-sm text-slate-300">❌ Unauthorized - Token manquant/invalide</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-red-400 mb-2">404</div>
                        <p class="text-sm text-slate-300">❌ Not Found - Ressource inexistante</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-red-400 mb-2">422</div>
                        <p class="text-sm text-slate-300">❌ Unprocessable - Erreur de validation</p>
                    </div>
                    <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4 hover:border-slate-600 transition">
                        <div class="font-mono text-lg font-bold text-red-400 mb-2">500</div>
                        <p class="text-sm text-slate-300">❌ Server Error - Erreur serveur</p>
                    </div>
                </div>
            </div>

            <!-- ERREURS -->
            <div id="erreurs" class="mb-20 scroll-mt-20">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center font-bold">⚠️</div>
                    <h3 class="text-3xl font-bold text-white">6. Gestion des Erreurs</h3>
                </div>

                <!-- Validation Error -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">422</span>
                        <code class="text-blue-400 font-mono">Erreur de Validation</code>
                    </div>
                    <p class="text-slate-300 mb-4">Quand les données ne passent pas la validation</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <pre class="text-sm text-red-400 overflow-x-auto"><code>{
  "message": "Le titre doit contenir au moins 3 caractères.",
  "errors": {
    "title": [
      "Le titre doit contenir au moins 3 caractères."
    ]
  }
}</code></pre>
                    </div>
                </div>

                <!-- Not Found Error -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 mb-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">404</span>
                        <code class="text-blue-400 font-mono">Ressource Non Trouvée</code>
                    </div>
                    <p class="text-slate-300 mb-4">Quand la ressource n'existe pas</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <pre class="text-sm text-red-400 overflow-x-auto"><code>{
  "message": "No query results found for model [App\\Models\\Book].",
  "exception": "ModelNotFoundException"
}</code></pre>
                    </div>
                </div>

                <!-- Unauthorized Error -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-6 hover:border-slate-600 transition">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-red-900/50 text-red-400 rounded text-sm font-semibold">401</span>
                        <code class="text-blue-400 font-mono">Non Autorisé</code>
                    </div>
                    <p class="text-slate-300 mb-4">Quand le token est manquant ou invalide</p>
                    <div class="bg-slate-900/50 rounded-lg p-4">
                        <pre class="text-sm text-red-400 overflow-x-auto"><code>{
  "message": "Unauthorized"
}</code></pre>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-slate-700 pt-8 mt-16">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-slate-400 text-sm mb-4 md:mb-0">
                        © 2025 Library API • Créée par Hermas Francisco • Laravel 12
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-slate-400 hover:text-slate-200 transition text-sm">Documentation</a>
                        <a href="#" class="text-slate-400 hover:text-slate-200 transition text-sm">GitHub</a>
                        <a href="#" class="text-slate-400 hover:text-slate-200 transition text-sm">Support</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
