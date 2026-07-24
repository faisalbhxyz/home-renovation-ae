export function formatPostDate(iso: string): string {
  return new Intl.DateTimeFormat("en-AE", {
    day: "numeric",
    month: "short",
    year: "numeric",
  }).format(new Date(`${iso}T12:00:00`));
}
