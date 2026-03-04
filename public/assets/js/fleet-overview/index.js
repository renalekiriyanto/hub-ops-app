function indexPage() {
    return {
        loaging: false,
        drivers: [],

        init() {
            this.fetchFleetOverview();
        },

        async fetchFleetOverview() {
            this.loading = true;
            try {
                const response = await axios.get('driver/fleet-overview');
                console.log('Fleet overview response:', response.data);
                const data = await response.json();
                this.drivers = data.drivers;
            } catch (error) {
                console.error('Error fetching fleet overview:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}