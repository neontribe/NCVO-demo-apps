// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import type {NextApiRequest, NextApiResponse} from 'next'
import {WHO_AM_I_ROUTE} from "@/config";

type Data = {
  name: string
}

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse<Data>
) {
  const bcAppSession = "CURRENTLY UNKNOWN"
  const options = {
    method: 'get',
    headers: new Headers({
        'Authorization': `Bearer ${bcAppSession}`,
        'Content-Type': 'application/x-www-form-urlencoded'
    }),
  }

  const response = await fetch(WHO_AM_I_ROUTE, options)
  const content = await response.text()

  let data = {}
  if (content) {
    data = {}
  } else {
    data = {}
  }

  res.status(response.status).json({name: ""})
}
