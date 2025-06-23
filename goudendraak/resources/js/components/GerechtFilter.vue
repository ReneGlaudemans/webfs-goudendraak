<template>
  <div class="gerecht-filter">
    <input
      v-model="filters.naam"
      type="text"
      placeholder="Filter op naam"
      class="input"
    />

    <input
      v-model="filters.nummer"
      type="text"
      placeholder="Filter op nummer"
      class="input"
    />

    <select v-model="filters.categorie" class="input">
      <option value="">Alle categorieën</option>
      <option
        v-for="categorie in uniekeCategorieen"
        :key="categorie"
        :value="categorie"
      >
        {{ categorie }}
      </option>
    </select>

    <ul class="gerecht-lijst">
      <li v-for="gerecht in gefilterdeGerechten" :key="gerecht.id">
        {{ gerecht.naam }} ({{ gerecht.nummer }}) - {{ gerecht.categorie }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

// Props van Laravel of via API
const props = defineProps({
  gerechten: {
    type: Array,
    required: true,
  },
});

// Filterwaarden
const filters = ref({
  naam: '',
  nummer: '',
  categorie: '',
});

// Unieke categorieën voor dropdown
const uniekeCategorieen = computed(() => {
  const categoriën = props.gerechten.map(g => g.categorie);
  return [...new Set(categoriën)];
});

// Filter logica
const gefilterdeGerechten = computed(() => {
  return props.gerechten.filter(gerecht => {
    const naamMatch = gerecht.naam.toLowerCase().includes(filters.value.naam.toLowerCase());
    const nummerMatch = filters.value.nummer === '' || gerecht.nummer.toString().includes(filters.value.nummer);
    const categorieMatch = filters.value.categorie === '' || gerecht.categorie === filters.value.categorie;

    return naamMatch && nummerMatch && categorieMatch;
  });
});
</script>

<style scoped>
.input {
  display: block;
  margin: 8px 0;
  padding: 6px;
  width: 100%;
}

.gerecht-lijst {
  list-style: none;
  padding: 0;
}

.gerecht-lijst li {
  padding: 4px 0;
}
</style>