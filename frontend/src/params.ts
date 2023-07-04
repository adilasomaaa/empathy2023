const params = new URLSearchParams(location.search)

function generateRandomString(length: number, characters: string): string {
    let result = '';
  
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      result += characters.charAt(randomIndex);
    }
  
    return result;
  }

export const roomId = params.get('room_id') || generateRandomString(3, 'abc123')
export const lang = params.get('lang') || 'id_ID'
export const langIsSet = !!params.get('lang')